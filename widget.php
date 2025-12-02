<?php

namespace cbCownDownWidget;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class cbCownDown_Countdown_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'cb-countdown-timer-widget';
    }

    public function get_title()
    {
        return __('CB Countdown', 'cb-countdown-timer');
    }

    public function get_icon()
    {
        return 'eicon-countdown';
    }

    public function get_categories()
    {
        return ['general'];
    }


protected function register_controls() {

    /**
     * CONTENT TAB
     */
    $this->start_controls_section(
        'cb-countdown-section_setting',
        [
            'label' => esc_html__( 'Countdown Settings', 'cb-countdown-timer' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'cb_countDown_target_date',
        [
            'label'   => esc_html__( 'Date and Time', 'cb-countdown-timer' ),
            'type'    => \Elementor\Controls_Manager::DATE_TIME,
            'default' => '2033-05-31 00:00:00',
        ]
    );

    $this->end_controls_section();

    /**
     * STYLE TAB → VISIBILITY SWITCHES
     */
    $this->start_controls_section(
        'cb_countdown_switch',
        [
            'label' => esc_html__( 'Units Visibility', 'cb-countdown-timer' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'cb-month-switch',
        [
            'label'        => esc_html__( 'Months', 'cb-countdown-timer' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'On', 'cb-countdown-timer' ),
            'label_off'    => esc_html__( 'Off', 'cb-countdown-timer' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        ]
    );

    $this->add_control(
        'cb-days-switch',
        [
            'label'        => esc_html__( 'Days', 'cb-countdown-timer' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'On', 'cb-countdown-timer' ),
            'label_off'    => esc_html__( 'Off', 'cb-countdown-timer' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        ]
    );

    $this->add_control(
        'cb-hours-switch',
        [
            'label'        => esc_html__( 'Hours', 'cb-countdown-timer' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'On', 'cb-countdown-timer' ),
            'label_off'    => esc_html__( 'Off', 'cb-countdown-timer' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        ]
    );

    $this->add_control(
        'cb-minutes-switch',
        [
            'label'        => esc_html__( 'Minutes', 'cb-countdown-timer' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'On', 'cb-countdown-timer' ),
            'label_off'    => esc_html__( 'Off', 'cb-countdown-timer' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        ]
    );

    $this->add_control(
        'cb-seconds-switch',
        [
            'label'        => esc_html__( 'Seconds', 'cb-countdown-timer' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'On', 'cb-countdown-timer' ),
            'label_off'    => esc_html__( 'Off', 'cb-countdown-timer' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        ]
    );

    $this->end_controls_section();

    /**
     * STYLE TAB → WRAPPER
     */
    $this->start_controls_section(
        'cb_countdown_wrapper_style',
        [
            'label' => esc_html__( 'Wrapper', 'cb-countdown-timer' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name'     => 'cb_wrapper_background',
            'label'    => esc_html__( 'Background', 'cb-countdown-timer' ),
            'types'    => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .cb-countdown-timer-widget-area',
        ]
    );

    $this->add_responsive_control(
        'cb_wrapper_padding',
        [
            'label'      => esc_html__( 'Padding', 'cb-countdown-timer' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'default'    => [
                'top'    => 40,
                'right'  => 24,
                'bottom' => 40,
                'left'   => 24,
                'unit'   => 'px',
            ],
            'selectors'  => [
                '{{WRAPPER}} .cb-countdown-timer-widget-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'cb_wrapper_radius',
        [
            'label'      => esc_html__( 'Border Radius', 'cb-countdown-timer' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'default'    => [
                'top'    => 28,
                'right'  => 28,
                'bottom' => 28,
                'left'   => 28,
                'unit'   => 'px',
            ],
            'selectors'  => [
                '{{WRAPPER}} .cb-countdown-timer-widget-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();

    /**
     * STYLE TAB → CIRCLES (NUMBER)
     */
    $this->start_controls_section(
        'cb_coundown_circle_style_section',
        [
            'label' => esc_html__( 'Circle / Number', 'cb-countdown-timer' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    // Circle size
    $this->add_responsive_control(
        'cb_circle_size',
        [
            'label'      => esc_html__( 'Circle Size', 'cb-countdown-timer' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [
                'px' => [
                    'min' => 60,
                    'max' => 220,
                ],
            ],
            'default'    => [
                'size' => 120,
                'unit' => 'px',
            ],
            'selectors'  => [
                '{{WRAPPER}} .cb-countdown-timer p' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Outer circle background
    $this->add_control(
        'cb_circle_outer_bg',
        [
            'label'     => esc_html__( 'Outer Circle Color', 'cb-countdown-timer' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cb-countdown-timer p' => 'background: {{VALUE}};',
            ],
        ]
    );

    // Inner circle background (pseudo-element)
    $this->add_control(
        'cb_circle_inner_bg',
        [
            'label'     => esc_html__( 'Inner Circle Color', 'cb-countdown-timer' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cb-countdown-timer p::before' => 'background: {{VALUE}};',
            ],
        ]
    );

    // Circle shadow
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name'     => 'cb_circle_shadow',
            'selector' => '{{WRAPPER}} .cb-countdown-timer p',
        ]
    );

    // Number typography
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name'     => 'cb_countdown_number_typography',
            'label'    => esc_html__( 'Number Typography', 'cb-countdown-timer' ),
            'selector' => '{{WRAPPER}} .cb-countdown-timer p',
        ]
    );

    // Number color
    $this->add_control(
        'cb_countdown_number_color',
        [
            'label'     => esc_html__( 'Number Color', 'cb-countdown-timer' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cb-countdown-timer p' => 'color: {{VALUE}};',
            ],
        ]
    );

    // Gap between circles (your existing control, kept here)
    $this->add_control(
        'cb_countdown_gap',
        [
            'label'   => esc_html__( 'Gap Between Circles (px)', 'cb-countdown-timer' ),
            'type'    => \Elementor\Controls_Manager::NUMBER,
            'min'     => 5,
            'max'     => 100,
            'step'    => 1,
            'default' => 24,
        ]
    );

    $this->end_controls_section();

    /**
     * STYLE TAB → LABELS (MONTH / DAYS / ETC.)
     */
    $this->start_controls_section(
        'cb_coundown_label_style_section',
        [
            'label' => esc_html__( 'Labels', 'cb-countdown-timer' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name'     => 'cb_countdown_label_typography',
            'label'    => esc_html__( 'Label Typography', 'cb-countdown-timer' ),
            'selector' => '{{WRAPPER}} .cb-countdown-timer p span',
        ]
    );

    $this->add_control(
        'cb_countdown_label_color',
        [
            'label'     => esc_html__( 'Label Color', 'cb-countdown-timer' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .cb-countdown-timer p span' => 'color: {{VALUE}};',
            ],
        ]
    );

    // Distance of label from circle bottom
    $this->add_responsive_control(
        'cb_label_offset',
        [
            'label'      => esc_html__( 'Label Offset', 'cb-countdown-timer' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [
                'px' => [
                    'min' => -40,
                    'max' => 40,
                ],
            ],
            'default'    => [
                'size' => -28,
                'unit' => 'px',
            ],
            'selectors'  => [
                '{{WRAPPER}} .cb-countdown-timer p span' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();
}



    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $target_date = $settings['cb_countDown_target_date'];

        // unique id generated for each widget
        $unique_id = uniqid('countdown_');
        $function_name = 'cbUpdateCountdown_' . $unique_id;


?>

        <div class="cb-countdown-timer-widget-area">
            <div id="<?php echo esc_attr($unique_id); ?>" class="cb-countdown-timer" style="gap:<?php echo esc_attr($settings['cb_countdown_gap']); ?>px"></div>
        </div>

        <script>
            jQuery(document).ready(function($) {

                var targetDate = new Date("<?php echo esc_js($target_date); ?>").getTime();

                var countdownId = "<?php echo esc_js($unique_id); ?>";

                var <?php echo esc_js($function_name); ?> = setInterval(function() {
                    cbUpdateCountdown(countdownId);
                }, 1000);


                var countdownInterval = setInterval(cbUpdateCountdown, 1000);

                function cbUpdateCountdown(countdownId) {
                    var currentDate = new Date().getTime();
                    var timeRemaining = targetDate - currentDate;


                    // month checked if enabled from elementor switch panel
                    <?php if ('yes' === $settings['cb-month-switch']) : ?>
                        var months = Math.floor(timeRemaining / (1000 * 60 * 60 * 24 * 30));
                    <?php else : ?>
                        var months = '';
                    <?php endif ?>

                    // days checked if enabled from elementor switch panel
                    <?php if ('yes' === $settings['cb-days-switch']) : ?>
                        var days = Math.floor((timeRemaining % (1000 * 60 * 60 * 24 * 30)) / (1000 * 60 * 60 * 24));
                    <?php else : ?>
                        var days = '';
                    <?php endif ?>

                    // hours checked if enabled from elementor switch panel
                    <?php if ('yes' === $settings['cb-hours-switch']) : ?>
                        var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    <?php else : ?>
                        var hours = '';
                    <?php endif ?>

                    // minutes checked if enabled from elementor switch panel
                    <?php if ('yes' === $settings['cb-minutes-switch']) : ?>
                        var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                    <?php else : ?>
                        var minutes = '';
                    <?php endif ?>

                    // seconds checked if enabled from elementor switch panel
                    <?php if ('yes' === $settings['cb-seconds-switch']) : ?>
                        var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
                    <?php else : ?>
                        var seconds = '';
                    <?php endif ?>



                    // var days = Math.floor((timeRemaining % (1000 * 60 * 60 * 24 * 30)) / (1000 * 60 * 60 * 24));
                    // var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    // var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                    // var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);


                    var monthMarkup = months !== '' ? '<p class="cb-countdown-timer-month">' + (months || '0') + '<span> Months</span></p>' : '';
                    var daysMarkup = days !== '' ? '<p class="cb-countdown-timer-days">' + (days || '0') + '<span> Days</span></p>' : '';
                    var hoursMarkup = hours !== '' ? '<p class="cb-countdown-timer-hours">' + (hours || '0') + '<span> Hours</span></p>' : '';
                    var minMarkup = minutes !== '' ? '<p class="cb-countdown-timer-minutes">' + (minutes || '0') + '<span> Minutes</span></p>' : '';
                    var secondMarkup = seconds !== '' ? '<p class="cb-countdown-timer-seconds">' + (seconds || '0') + '<span> Seconds</span></p>' : '';



                    var totalDueTimeWithMarkup = monthMarkup + daysMarkup + hoursMarkup + minMarkup + secondMarkup;

                    // var countdownText = months + " months, " + days + " days, " + hours + " hours, " + minutes + " minutes, " + seconds + " seconds";

                    // var countdownText = months + " " + cbCountDown_translate('months') + ", " + days + " " + cbCountDown_translate('days') + ", " + hours + " " + cbCountDown_translate('hours') + ", " + minutes + " " + cbCountDown_translate('minutes') + ", " + seconds + " " + cbCountDown_translate('seconds');

                    $('#<?php echo esc_attr($unique_id); ?>').html(totalDueTimeWithMarkup);

                    if (timeRemaining <= 0) {
                        clearInterval(countdownInterval);
                        $('#countdown').text('Countdown expired');
                    }

                }
            });
        </script>


<?php
    }
}
