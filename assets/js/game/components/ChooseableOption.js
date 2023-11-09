export class ChooseableOption {
  constructor({ element, defaultValue, defaultIndex }) {
    this.element = element;
    this.keysListened = {
      left: "ArrowLeft",
      right: "ArrowRight",
      choose: "Enter",
    };
    this.value = defaultValue;
    this.currentIndex = defaultIndex;
  }

  showOptions(customFuncionality) {
    this.element.classList.add("activeFlex");
    if (customFuncionality) customFuncionality();
  }

  hideOptions() {
    this.element.classList.remove("activeFlex");
  }

  async handleKeyPressed(e) {
    const elements = Array.from(this.element.children);
    return new Promise((resolve) => {
      switch (e.code) {
        case this.keysListened.left:
          if (this.currentIndex > 0) {
            this.currentIndex--;
            elements[this.currentIndex].classList.add("choice");
            elements[this.currentIndex + 1].classList.remove("choice");
            this.value = elements[this.currentIndex].dataset.options;
          }
          break;
        case this.keysListened.right:
          if (this.currentIndex < elements.length - 1) {
            this.currentIndex++;
            elements[this.currentIndex].classList.add("choice");
            elements[this.currentIndex - 1].classList.remove("choice");
            this.value = elements[this.currentIndex].dataset.options;
          }
          break;
        case this.keysListened.choose:
          this.hideOptions();
          resolve(this.value);
      }
    });
  }
}
