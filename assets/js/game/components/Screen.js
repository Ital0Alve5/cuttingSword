export class Screen {
  constructor(
    dimensions = { width: 1024, height: 576 },
    positionOnWindow = { x: 0, y: 0 }
  ) {
    this.dimensions = dimensions;
    this.positionOnWindow = positionOnWindow;
  }
}
