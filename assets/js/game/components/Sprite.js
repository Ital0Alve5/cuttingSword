export class Sprite {
  constructor({
    imageSrc = "",
    maxFrames = 1,
    framesHold = 5,
    position = {
      x: 0,
      y: 0,
    },
    scale = 1,
    offset = { x: 0, y: 0 },
  }) {
    this.position = position;
    this.image = new Image();
    this.image.src = imageSrc;
    this.scale = scale;
    this.maxFrames = maxFrames;
    this.currentFrame = 0;
    this.framesElapsed = 0;
    this.framesHold = framesHold;
    this.offset = offset;
    this.keepLastFrame = false;
    this.isLastFrame = false;
  }

  setPosition(position) {
    this.position = position;
  }

  update() {
    this.draw();
  }

  draw(context) {
    context.drawImage(
      this.image,
      this.currentFrame * (this.image.width / this.maxFrames),
      this.offset.y,
      this.image.width / this.maxFrames,
      this.image.height,
      this.position.x,
      this.position.y,
      (this.image.width / this.maxFrames) * this.scale,
      this.image.height * this.scale
    );
    this.updateFrames();
  }

  isKeepingLastFrame() {
    if (this.currentFrame === this.maxFrames - 1 && this.keepLastFrame) {
      this.currentFrame = this.maxFrames - 1;
      this.isLastFrame = true;
      return true;
    }
    return false;
  }

  updateFrames() {
    this.framesElapsed++;

    if (this.isKeepingLastFrame()) return;

    if (this.framesElapsed % this.framesHold === 0) {
      if (this.currentFrame < this.maxFrames - 1) {
        this.currentFrame++;
      } else {
        this.currentFrame = 0;
      }
    }
  }
}
