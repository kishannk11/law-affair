const customClass = {
    popup: "error-popup",
    title: "error-title",
    content: "error-text"
  };
   const css = `
    .error-popup {
      color: red;
    }
    .error-title {
      color: red;
    }
    .error-text {
      color: red;
    }
  `;
   const style = document.createElement('style');
  style.innerHTML = css;
  document.head.appendChild(style);