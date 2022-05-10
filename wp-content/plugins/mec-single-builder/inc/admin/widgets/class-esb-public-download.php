<?php
namespace Elementor;

namespace MEC_Single_Builder\Inc\Admin\Widgets;

use Elementor\Plugin;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class ESB_Public_Download extends \Elementor\Widget_Base{

	/**
	 * Retrieve Alert widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name(){

		return 'event_public_download';
	}

	/**
	 * Retrieve Alert widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title(){

		return __('Single Event Public Download', 'mec-single-builder');
	}

	/**
	 * Retrieve Alert widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon(){

		return 'mec-fa-download';
	}

	/**
	 * Set widget category.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget category.
	 */
	public function get_categories(){

		return ['single_builder'];
	}

	/**
	 * Register Alert widget controls.
	 *
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls(){

		$this->start_controls_section(
			'mec_box_typography',
			array(
				'label' 	=> __('Box', 'mec-single-builder'),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'mec_box_typography_padding', //param_name
			[
				'label' 		=> __('Button Padding', 'mec-single-builder'), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> ['px', 'em', '%'],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mec_box_typography_margin', //param_name
			[
				'label' 		=> __('Button Margin', 'mec-single-builder'), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> ['px', 'em', '%'],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mec_box_box_width',
			[
				'label' 		=> __('Button Width', 'mec-single-builder'),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mec_box_typography_bgcolor',
			[
				'label' 		=> __('Button Background Color', 'mec-single-builder'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'mec_box_typography_bgcolor_hover',
			[
				'label' 		=> __('Button Hover Background Color', 'mec-single-builder'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details:hover' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'mec_box_typo_border',
				'label' 		=> __('Border', 'mec-single-builder'),
				'selector' 		=> '{{WRAPPER}} .mec-public-download-details',
			]
		);

		$this->add_control(
			'mec_box_typo_shape_radius', //param_name
			[
				'label' 		=> __('Border Radius', 'mec-single-builder'), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> ['px', 'em', '%'],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'mec_box_typo_box_shadow',
				'label' 	=> __('Box Shadow', 'mec-single-builder'),
				'selector' 	=> '{{WRAPPER}} .mec-public-download-details',
			]
		);

		$this->end_controls_section();


		//////

		$this->start_controls_section(
			'mec_description_typography',
			array(
				'label' 	=> __('Description', 'mec-single-builder'),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'mec_description_typography_title',
				'label' 	=> __('Button Typography', 'mec-single-builder'),
				'selector' 	=> '{{WRAPPER}} .mec-public-download-details p',
			]
		);

		$this->add_control(
			'mec_description_typography_color',
			[
				'label' 		=> __('Text Color', 'mec-single-builder'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'mec_description_typography_color_hover',
			[
				'label' 		=> __('Text Hover Color', 'mec-single-builder'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details p:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'mec_description_typography_padding', //param_name
			[
				'label' 		=> __('Button Padding', 'mec-single-builder'), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> ['px', 'em', '%'],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mec_description_typography_margin', //param_name
			[
				'label' 		=> __('Button Margin', 'mec-single-builder'), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> ['px', 'em', '%'],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mec_description_box_width',
			[
				'label' 		=> __('Button Width', 'mec-single-builder'),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details p' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mec_description_typography_bgcolor',
			[
				'label' 		=> __('Button Background Color', 'mec-single-builder'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details p' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'mec_description_typography_bgcolor_hover',
			[
				'label' 		=> __('Button Hover Background Color', 'mec-single-builder'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details p:hover' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'mec_description_typo_border',
				'label' 		=> __('Border', 'mec-single-builder'),
				'selector' 		=> '{{WRAPPER}} .mec-public-download-details p',
			]
		);

		$this->add_control(
			'mec_description_typo_shape_radius', //param_name
			[
				'label' 		=> __('Border Radius', 'mec-single-builder'), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> ['px', 'em', '%'],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details p' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'mec_description_typo_box_shadow',
				'label' 	=> __('Box Shadow', 'mec-single-builder'),
				'selector' 	=> '{{WRAPPER}} .mec-public-download-details p',
			]
		);

		$this->end_controls_section();


		//////


		$this->start_controls_section(
			'mec_btn_typography',
			array(
				'label' 	=> __('Download Button', 'mec-single-builder'),
				'tab'   	=> \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'mec_btn_typography_title',
				'label' 	=> __('Button Typography', 'mec-single-builder'),
				'selector' 	=> '{{WRAPPER}} .mec-public-download-details .button',
			]
		);

		$this->add_control(
			'mec_btn_typography_color',
			[
				'label' 		=> __('Text Color', 'mec-single-builder'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details .button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'mec_btn_typography_color_hover',
			[
				'label' 		=> __('Text Hover Color', 'mec-single-builder'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details .button:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'mec_btn_typography_padding', //param_name
			[
				'label' 		=> __('Button Padding', 'mec-single-builder'), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> ['px', 'em', '%'],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mec_btn_typography_margin', //param_name
			[
				'label' 		=> __('Button Margin', 'mec-single-builder'), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> ['px', 'em', '%'],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details .button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mec_btn_box_width',
			[
				'label' 		=> __('Button Width', 'mec-single-builder'),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details .button' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mec_btn_typography_bgcolor',
			[
				'label' 		=> __('Button Background Color', 'mec-single-builder'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details .button' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'mec_btn_typography_bgcolor_hover',
			[
				'label' 		=> __('Button Hover Background Color', 'mec-single-builder'),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details .button:hover' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'mec_btn_typo_border',
				'label' 		=> __('Border', 'mec-single-builder'),
				'selector' 		=> '{{WRAPPER}} .mec-public-download-details .button',
			]
		);

		$this->add_control(
			'mec_btn_typo_shape_radius', //param_name
			[
				'label' 		=> __('Border Radius', 'mec-single-builder'), //heading
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, //type
				'size_units' 	=> ['px', 'em', '%'],
				'selectors' 	=> [
					'{{WRAPPER}} .mec-public-download-details .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'mec_btn_typo_box_shadow',
				'label' 	=> __('Box Shadow', 'mec-single-builder'),
				'selector' 	=> '{{WRAPPER}} .mec-public-download-details .button',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render Alert widget output on the frontend.
	 *
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render(){

		echo \MEC\SingleBuilder\SingleBuilder::getInstance()->output( 'event-public-download' );
	}
}
