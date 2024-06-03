
/*
	Ensambles the images into the canvas.
*/
class Ensambler {

	/**
	 * Draws an image into the canvas.
	 * 
	 * @param {*} ctx The canvas 2D context.
	 * @param {*} code The part code;
	 * @param {*} fPath The path to images directory.
	 */
	#drawImage(ctx, code, fPath)
	{
		let image = new Image();
		image.src = fPath + '/' + code + '.png';
		image.onload = () => {
			ctx.drawImage(image, 0, 0);
		}
	}

	/**
	 * Do the logic.
	 * 
	 * @param {*} code The treasure code and canvas id (without canvas-).
	 * @param {*} parts The treasure part codes.
	 * @param {*} width The width.
	 * @param {*} height The height.
	 * @param {boolean} base If there is a base image to always draw. Default false.
	 * @param {boolean} upper If there is a upper image to always draw. Default false.
	 */
	create(code, parts, width, height, base = false, upper = false)
	{
		let c = document.getElementById('canvas-' + code);
		let ctx = c.getContext("2d");
		let fPath = '/Museo/assets/img/' + code.replace(/_/g, '/');

		c.style.width = width + 'px';
		c.style.height = height + 'px';
		c.width = width;
		c.height = height;

		if(base)
		{
			this.#drawImage(ctx, 'base', fPath);
		}
		
		for (const p of parts) {
			this.#drawImage(ctx, p, fPath);
		}

		if(upper)
		{
			this.#drawImage(ctx, 'upper', fPath);
		}
	}
}