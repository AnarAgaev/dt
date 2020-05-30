/*
 * Regulars and Validators
 */
const _emailRegular = /.+@.+\..+/i;

const validator = (regular, text) => {
  return regular.test(text);
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

  const getResource = async (url, data) => {
    const _apiBase = 'http://designtalk/';

    const response = data === undefined
      ? await fetch(`${_apiBase}${url}`)
      : await fetch(`${_apiBase}${url}`, {
        method: 'POST',
        cache  : 'no-cache',
        body: objectToFormData(data)
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
   * Show more articles
   */
  const btnShowMoreArticles = document
    .getElementsByClassName('button_show-more-articles')[0];
  const spinner = document.getElementById('spinner');

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


  /*
   * Handle subscribe news form
   */
  const subsForm = document
    .getElementById('subscribeForm');

  subsForm.addEventListener('submit', e => {
    e.preventDefault();

    const input = subsForm
      .getElementsByClassName('form-control')[0];

    const formGroup = subsForm
      .getElementsByClassName('form-group')[0];

    if (validator(_emailRegular, input.value)) {
      // Send form
      formGroup.classList.remove('has-error');
      spinner.classList.add('visible');

      getResource('scripts/handle-form-subscribe.php?email=' + input.value)
        .then((response) => {
          spinner.classList.remove('visible');
          const msgTrue = 'Мы выслали Вам письмо с подтверждением. ' +
            'Пожалуйста, проверьте свою почту и подтвердите подписку.';
          const msgFalse = 'К сожалению, не получилось оформить подписку ' +
            'на новости. Попробуйте немного позже.';

          response.status
            ? showModalMsg(msgTrue)
            : showModalMsg(msgFalse)
        })
        .catch((error) => {
          console.log(error);
        });
    } else {
      input.focus();
      formGroup.classList.add('has-error');
    }
  });




  /*
   * Handle popular articles slider
   */
  const handlePopularControls = (direction) => {
    const windowWidth = window.innerWidth;
    const itemWidth = 305; // from .popular-list-item as width + margin-right

    const popularList = document
      .getElementById('popularList');

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












});