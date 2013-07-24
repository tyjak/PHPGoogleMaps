<?php

namespace PHPGoogleMaps\overlay;

/**
 * Marker Symbol class
 * Attach these to markers to display custom marker symbols
 *
 * Example:
 * $symbol = new \PHPGoogleMaps\Marker\MarkerSymbol( $symbol_url );
 * $symbol->setSize( 30, 30 );
 * $shadow = \PHPGoogleMaps\Marker\MarkerSymbol::create( $shadow_url )->setAnchor( 0, 30 );
 * $marker->setSymbol( $symbol );
 * $marker->setShadow( $shadow );
 */


class MarkerSymbol  extends \PHPGoogleMaps\Core\MapObject {

	/**
	 * path The symbol's path, which is a built-in symbol path, or a custom path expressed using SVG path notation. Required.
	 * Only predefined symbol allowed :
	 *
	 * BACKWARD_CLOSED_ARROW 	A backward-pointing closed arrow.
	 * BACKWARD_OPEN_ARROW 	A backward-pointing open arrow.
	 * CIRCLE 	A circle.
	 * FORWARD_CLOSED_ARROW 	A forward-pointing closed arrow.
	 * FORWARD_OPEN_ARROW 	A forward-pointing open arrow.
	 *
	 * 
	 * @var string
	 * @access protected
	 */
	protected $path;

	/**
	 * X coord of the anchor
	 *
	 * @var integer
	 */
	protected $anchor_x;

	/**
	 * Y coord of the anchor
	 *
	 * @var integer
	 */
	protected $anchor_y;

	/**
	 * fill_color The symbol's fill color, defaults to the stroke color of the corresponding polyline.
	 * 
	 * @var string
	 * @access protected
	 */
	protected $fill_color;

	/**
	 * fill_opacity The symbol's fill opacity. Defaults to 0. 
	 * 
	 * @var number
	 * @access protected
	 */
	protected $fill_opacity;

	/**
	 * rotation The angle by which to rotate the symbol, expressed clockwise in degrees. Defaults to 0.
	 * 
	 * @var number
	 * @access protected
	 */
	protected $rotation;

	/**
	 * scale The amount by which the symbol is scaled in size. For symbol markers, this defaults to 1.
	 * 
	 * @var number
	 * @access protected
	 */
	protected $scale;

	/**
	 * stroke_color The symbol's stroke color.
	 * 
	 * @var string
	 * @access protected
	 */
	protected $stroke_color;

	/**
	 * stroke_opacity The symbol's stroke opacity. For symbol markers, this defaults to 1.
	 * 
	 * @var number
	 * @access protected
	 */
	protected $stroke_opacity;

	/**
	 * stroke_weight The symbol's stroke weight. Defaults to the scale of the symbol.
	 * 
	 * @var number
	 * @access protected
	 */
	protected $stroke_weight;

	/**
	 * Constructor
	 * Sets the symbol's path name, color, anchor, scale and rotation
	 *
	 *
	 * Throws an exception if the symbol is invalid
	 *
	 * @param strin $path name of the predefined symbol
	 * @throws Exception
	 * @return MarkerSymbol
	 */
	public function __construct( $path, array $options = null ) {

		$this->path = $path;

		$this->anchor_x = isset( $options['anchor_x'] ) ? $options['anchor_x'] : 0;
		$this->anchor_y = isset( $options['anchor_y'] ) ? $options['anchor_y'] : 0;
		$this->fill_color = isset( $options['fill_color'] ) ? $options['fill_color'] : 'Red';
		$this->fill_opacity = isset( $options['fill_opacity'] ) ? $options['fill_opacity'] : 1;
		$this->rotation = isset( $options['rotation'] ) ? $options['rotation'] : 0;
		$this->scale = isset( $options['scale'] ) ? $options['scale'] : 3;
		$this->stroke_color = isset( $options['stroke_color'] ) ? $options['stroke_color'] : 'Black';
		$this->stroke_opacity = isset( $options['stroke_opacity'] ) ? $options['stroke_opacity'] : 1;
		$this->stroke_weight = isset( $options['stroke_weight'] ) ? $options['stroke_weight'] : 1;

		return $this;

	}

	/**
	 * Static create method useful for method chaining
	 *
	 * @param strin $symbol URL of the symbol image
	 * @throws Exception
	 * @return MarkerSymbol
	 */
	public static function create( $path, array $options=null ) {
		return new MarkerSymbol( $path, $options );
	}

	/**
	 * Set the symbol's anchor point
	 * This is the point on the symbol that will be placed on the map
	 *
	 * @param int $x X coord of the anchor
	 * @param int $y Y coord of the anchor
	 * @return MarkerSymbol
	 */
	public function setAnchor( $x=null, $y=null ) {
		if ( $x !== null ) {
			$this->anchor_x = (int) $x;
		}
		if ( $y !== null ) {
			$this->anchor_y = (int) $y;
		}
		return $this;
	}

	/**
	 * setFillColor 
	 * 
	 * @param string $fillColor 
	 * @access public
	 * @return MarkerSymbol
	 */
	public function setFillColor($fillColor) {
		if( $fillColor !== null ) {
			$this->fill_color = $fillColor;
		}
		return $this;
	}

	/**
	 * setFillOpacity 
	 * 
	 * @param int $fillOpacity 
	 * @access public
	 * @return MarkerSymbol
	 */
	public function setFillOpacity($fillOpacity) {
		if( $fillOpacity !== null ) {
			$this->fill_opacity = (int) $fillOpacity;
		}
		return $this;
	}

	/**
	 * setRotation 
	 * 
	 * @param int $rotation 
	 * @access public
	 * @return MarkerSymbol
	 */
	public function setRotation($rotation) {
		if( $rotation !== null ) {
			$this->rotation = (int) $rotation;
		}
		return $this;
	}

	/**
	 * setScale 
	 * 
	 * @param int $scale 
	 * @access public
	 * @return MarkerSymbol
	 */
	public function setScale($scale) {
		if( $scale !== null ) {
			$this->scale = (int) $scale;
		}
		return $this;
	}

	/**
	 * setStrokeColor 
	 * 
	 * @param string $strokeColor 
	 * @access public
	 * @return MarkerSymbol
	 */
	public function setStrokeColor($strokeColor) {
		if( $strokeColor !== null ) {
			$this->strokeColor = $strokeColor;
		}
		return $this;
	}

	/**
	 * setStrokeOpacity 
	 * 
	 * @param int $strokeOpacity 
	 * @access public
	 * @return MarkerSymbol
	 */
	public function setStrokeOpacity($strokeOpacity) {
		if( $strokeOpacity !== null ) {
			$this->strokeOpacity = (int) $strokeOpacity;
		}
		return $this;
	}

	/**
	 * setStrokeWeight 
	 * 
	 * @param int $strokeWeight 
	 * @access public
	 * @return MarkerSymbol
	 */
	public function setStrokeWeight($strokeWeight) {
		if( $strokeWeight !== null ) {
			$this->strokeWeight = (int) $strokeWeight;
		}
		return $this;
	}

	/**
	 * Return string
	 */
	public function __toString() {
		return $this->symbol;
	}

}
