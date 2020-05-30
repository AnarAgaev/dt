/*
 * Regulars and Validators
 */
const _emailRegular = /.+@.+\..+/i;
const _phoneRegular = /^((8|\+7)[- ]?)?(\(?\d{3}\)?[- ]?)?[\d\- ]{5,10}$/i;
const _msgTrue = 'Зпрос отправлен. Менеджер свяжется с Вами в ближайшее время.';
const _msgFalse = 'К сожалению, запрос не отправлен. Попробуйте немного позже.';




const validator = (regular, text) => {
  return regular.test(text);
};



/*
 * Function for valid controls of any form
 */
const validFormControl = (group, controller, regular) => {
  if (regular) {
    if (!validator(regular, controller.value)) {
      controller.focus();
      group
        .classList
        .add('has-error');
    } else {
      group
        .classList
        .remove('has-error');
    }
  } else {
    if (!controller.value) {
      controller.focus();
      group
        .classList
        .add('has-error');
    } else {
      group
        .classList
        .remove('has-error');
    }
  }
};



/*
 * Stop handle event to 6ms
 */
let isBlocked = false;
const blocker = (timeout = 600) => {
  isBlocked = true;
  setTimeout(
    () => isBlocked = false,
    timeout
  );
};



document.addEventListener("DOMContentLoaded", function(event) {

  /*
   * Actions when window is scrolling
   */
  window.addEventListener('scroll', () => {
    showPic();
  });


  /*
   * Show/hide modal with some text message
   */
  const modal = document
    .getElementById('modalMsg');
  const btnCloseModalMsg = document
    .getElementById('btnCloseModalMsg');
  const showModalMsg = (msg) => {
    const msgContainer = modal
      .getElementsByClassName('modal__body')[0];

    msgContainer.innerHTML = msg;

    modal
      .classList
      .add('visible');
    btnCloseModalMsg.focus();

    document
      .body
      .classList
      .add('modal-open');
  };
  btnCloseModalMsg
    .addEventListener('click', () => {
      modal
        .classList
        .remove('visible');

      document
        .body
        .classList
        .remove('modal-open');
    });



  /*
   * Show picture when scroll is over it
   */
  const showPic = () => {
    const viewportHeight = document
      .documentElement
      .clientHeight;

    const articleList = document
      .getElementsByClassName('article-list__item');

    [].forEach.call(articleList, el => {
      const offsetTop = el.getBoundingClientRect().top;

      if (offsetTop < viewportHeight) {
        el.classList.add('visible');
      }
    });
  };



  /*
   * Cursor over images app
   */
  const cursor = document
    .getElementById('cursor');
  const imagesWithCursor = document
    .getElementsByClassName('cross-cursor');
  const sliderImgs = document
    .querySelectorAll('.last-article__picture img');

  // Function for move cursor when mouse is over image
  const moveCursor = event => {
    cursor.style.top = event.pageY + 'px';
    cursor.style.left = event.pageX + 'px';
    cursor.classList.add('visible');
  };

  // Listening when cursor of mouse is over or out on clickable image
  [].forEach.call(imagesWithCursor, el => {
    el.addEventListener('mousemove', moveCursor);
    el.addEventListener('mouseout', () => {
      cursor.classList.remove('visible');
    });
  });
  [].forEach.call(sliderImgs, el => {
    el.addEventListener('mousemove', moveCursor);
    el.addEventListener('mouseout', () => {
      cursor.classList.remove('visible');
    });
  });



  /*
   * Toggle header navigation
   */
  const btnsToggleNav = document
    .getElementsByClassName('btnToggleNav');

  const nav = document
    .querySelectorAll('.header .nav')[0];

  [].forEach.call(btnsToggleNav, el => {
      el.addEventListener('click', () => {
        nav
          .classList
          .toggle("visible");

        document
          .body
          .classList
          .toggle('modal-open');
      });
    });

  /*
   * Service for async getting data
   */
  const objectToFormData = (obj) => {
    const formData = new FormData();

    for (let key in obj) {
      formData.append(key, obj[key]);
    }

    return formData;
  };

  const getResource = async (url, formData) => {
    const _apiBase = 'http://designtalk/';

    const response = formData === undefined
      ? await fetch(`${_apiBase}${url}`)
      : await fetch(`${_apiBase}${url}`, {
        method: 'POST',
        cache  : 'no-cache',
        body: formData
      });

    if (!response.ok) {
      throw new Error(`Could not fetch data from ${url}, received ${response.status}`);
    }

    try {
      return await response.json();
    } catch (error) {
      throw new TypeError(`Received data must be a JSON. An error occurred on URL: ${response.url}`);
    }
  };

  const addChildren = (targetNode, resourceList, pageName) => {

    for (let i = 0; i < resourceList.length; i++) {
      const wrap = document.createElement('div');
      wrap.id = resourceList[i].id;
      wrap.classList.add('article-list__item', 'col-lg-6', pageName);

      // Adding picture
      const pic = document.createElement('a');
      const picDiv = document.createElement('div');
      const picImg = document.createElement('div');
      pic.classList.add('article-list__picture');
      pic.href = '/articles/' + resourceList[i].url;
      picImg.classList.add('padding-huck', 'cross-cursor');
      picImg.style.backgroundImage = "url('/images/" + resourceList[i].picture;
      pic.appendChild(picDiv.appendChild(picImg));

      // Adding listeners for print custom cursor to the picture
      picImg.addEventListener('mousemove', moveCursor);
      picImg.addEventListener('mouseout', () => {
        cursor.classList.remove('visible');
      });

      // Adding rubric of articles
      const rubric = document.createElement('a');
      rubric.classList.add('article-list__rubric', 'link');
      rubric.href = resourceList[i].rubric.link;
      rubric.innerHTML = resourceList[i].rubric.name;

      // Adding caption of articles
      const caption = document.createElement('a');
      const captionTextWrap = document.createElement('span');
      caption.classList.add('article-list__caption');
      caption.href = resourceList[i].url;
      captionTextWrap.innerHTML = resourceList[i].title;
      caption.appendChild(captionTextWrap);

      // Building element and adding to the target node
      wrap.appendChild(pic);
      wrap.appendChild(rubric);
      wrap.appendChild(caption);
      targetNode.appendChild(wrap);
    }

    // Show added articles if it visible
    showPic();
  };


  /*
   * Setting articles to the source node
   */
  const setArticles = (e, response) => {
    response.next === null
      ? e.target.style.display = 'none'
      : e.target.dataset.urlResource = response.next;

    const targetNode = document
      .getElementById(e.target.dataset.targetNodeId);

    addChildren(
      targetNode,
      response.results,
      e.target.dataset.pageName
    );
  };




  /*
   * Handle click on button Show more articles
   */
  const btnShowMoreArticles = document
    .getElementsByClassName('button_show-more-articles')[0];
  const spinner = document.getElementById('spinner');

  if (btnShowMoreArticles) {
    btnShowMoreArticles
      .addEventListener('click', (e) => {
        spinner.classList.add('visible');

        getResource(e.target.dataset.urlResource)
          .then((response) => {
            spinner.classList.remove('visible');
            setArticles(e, response);
          })
          .catch((error) => {
            console.log(error);
          });
      });
  }



  /*
   * Handle subscribe news form
   */
  const subsForm = document
    .getElementById('subscribeForm');

  if (subsForm) {
    subsForm.addEventListener('submit', e => {
      e.preventDefault();

      const email = subsForm
        .getElementsByClassName('form-control')[0];
      const formGroup = subsForm
        .getElementsByClassName('form-group')[0];

      validFormControl(formGroup, email, _emailRegular);

      if (
        !subsForm
          .getElementsByClassName('has-error')
          .length
      ) {
        // Send form
        spinner.classList.add('visible');

        getResource('scripts/handle-form-subscribe.php?email=' + email.value)
          .then((response) => {
            spinner.classList.remove('visible');

            response.status
              ? showModalMsg('Мы выслали Вам письмо с подтверждением. Пожалуйста, проверьте свою почту и подтвердите подписку.')
              : showModalMsg('К сожалению, не получилось оформить подписку на новости. Попробуйте немного позже.');
          })
          .catch((error) => {
            console.log(error);
          });
      } else {
        email.focus();
        formGroup.classList.add('has-error');
      }
    });
  }




  /*
   * Handle contacts form
   */
  const contactsForm = document
    .getElementById('contactsForm');

  if (contactsForm) {
    contactsForm.addEventListener('submit', e => {
      e.preventDefault();

      validFormControl(
        contactsForm
          .getElementsByClassName('questionGroup')[0],
        contactsForm
          .getElementsByClassName('question')[0]
      );
      validFormControl(
        contactsForm
          .getElementsByClassName('emailGroup')[0],
        contactsForm
          .getElementsByClassName('email')[0],
        _emailRegular
      );

      // Send Contacts form if it valid
      if (
        !contactsForm
          .getElementsByClassName('has-error')
          .length
      ) {
        spinner.classList.add('visible');

        getResource(
          'scripts/handle-form-contacts.php',
          new FormData(contactsForm))
            .then((response) => {
              spinner.classList.remove('visible');
              response.status
                ? showModalMsg(_msgTrue)
                : showModalMsg(_msgFalse);
            })
            .catch((error) => {
              console.log(error);
            });
      }
    });
  }




  /*
   * Handle For advertisers form
   */
  const forAdvForm = document
    .getElementById('forAdvForm');

  if (forAdvForm) {
    forAdvForm.addEventListener('submit', e => {
      e.preventDefault();

      validFormControl(
        forAdvForm
          .getElementsByClassName('questionGroup')[0],
        forAdvForm
          .getElementsByClassName('question')[0]
      );
      validFormControl(
        forAdvForm
          .getElementsByClassName('emailGroup')[0],
        forAdvForm
          .getElementsByClassName('email')[0],
        _emailRegular
      );
      validFormControl(
        forAdvForm
          .getElementsByClassName('phoneGroup')[0],
        forAdvForm
          .getElementsByClassName('phone')[0],
        _phoneRegular
      );

      // Send For advertisers form if it valid
      if (
        !forAdvForm
          .getElementsByClassName('has-error')
          .length
      ) {
        spinner.classList.add('visible');

        getResource(
          'scripts/handle-form-for-advertisers.php',
          new FormData(forAdvForm))
          .then((response) => {
            spinner.classList.remove('visible');
            response.status
              ? showModalMsg('Зпрос отправлен. Мы ответим Вам в ближайшее время.')
              : showModalMsg(_msgFalse);
          })
          .catch((error) => {
            console.log(error);
          });
      }
    });
  }




  /*
   * Handle Publish project form
   */
  const publishProjectForm = document
    .getElementById('publishProjectForm');

  if (publishProjectForm) {
    publishProjectForm.addEventListener('submit', e => {
      e.preventDefault();

      validFormControl(
        publishProjectForm
          .getElementsByClassName('descriptionGroup')[0],
        publishProjectForm
          .getElementsByClassName('description')[0]
      );
      validFormControl(
        publishProjectForm
          .getElementsByClassName('emailGroup')[0],
        publishProjectForm
          .getElementsByClassName('email')[0],
        _emailRegular
      );
      validFormControl(
        publishProjectForm
          .getElementsByClassName('phoneGroup')[0],
        publishProjectForm
          .getElementsByClassName('phone')[0],
        _phoneRegular
      );

      // Send Publish project form if it valid
      if (
        !publishProjectForm
        .getElementsByClassName('has-error')
        .length
      ) {
        spinner.classList.add('visible');

        getResource(
          'scripts/handle-form-publish-project.php',
          new FormData(publishProjectForm))
          .then((response) => {
            spinner.classList.remove('visible');
            response.status
              ? showModalMsg('Спасибо! Редакция рассмотрит Ваш проект и в двухнедельный срок сообщит о решении.')
              : showModalMsg(_msgFalse);
          })
          .catch((error) => {
            console.log(error);
          });
      }
    });
  }




  /*
   * Handle popular articles slider
   */
  const popularList = document
    .getElementById('popularList');

  const handlePopularControls = (direction) => {
    const windowWidth = window.innerWidth;
    const itemWidth = 305; // from .popular-list-item as width + margin-right

    const positionRight = popularList
      .getBoundingClientRect()
      .right;

    const  positionCurrent = popularList
      .offsetLeft;

    const offset = positionCurrent + itemWidth * direction;

    const move = (direction === -1 && positionRight > windowWidth)
      || (direction === 1 && positionCurrent);

    if (move && !isBlocked) {
      blocker(500); // stop other handlers to 600ms
      popularList.style.left = offset + 'px';
    }
  };

  if (popularList) {
    document
      .getElementById('popularControllerLeft')
      .addEventListener('click', () => {
        handlePopularControls(1);
      });

    document
      .getElementById('popularControllerRight')
      .addEventListener('click', () => {
        handlePopularControls(-1);
      });
  }












});