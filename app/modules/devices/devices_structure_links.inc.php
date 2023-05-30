<?php

$this->device_links=array(
    'SMotions,SButtons,SOpenClose,SCameras'=>array(
        array(
            'LINK_NAME'=>'switch_timer',
            'LINK_TITLE'=>LANG_DEVICES_LINK_SWITCH_TIMER,
            'LINK_DESCRIPTION'=>LANG_DEVICES_LINK_SWITCH_TIMER_DESCRIPTION,
            'TARGET_CLASS'=>'SControllers',
            'PARAMS'=>array(
                array(
                    'PARAM_NAME'=>'action_delay',
                    'PARAM_TITLE'=>LANG_DEVICES_LINK_SWITCH_TIMER_PARAM_ACTION_DELAY,
                    'PARAM_TYPE'=>'num'
                ),
                array(
                    'PARAM_NAME'=>'darktime',
                    'PARAM_TITLE'=>LANG_DEVICES_LINK_SWITCH_TIMER_PARAM_DARKTIME,
                    'PARAM_TYPE'=>'select',
                    'PARAM_OPTIONS'=>array(
                        array('TITLE'=>LANG_NO,'VALUE'=>'0'),
                        array('TITLE'=>LANG_YES,'VALUE'=>'1')
                    )
                )
            )
        ),
        array(
            'LINK_NAME'=>'switch_it',
            'LINK_TITLE'=>LANG_DEVICES_LINK_SWITCH_IT,
            'LINK_DESCRIPTION'=>LANG_DEVICES_LINK_SWITCH_IT_DESCRIPTION,
            'TARGET_CLASS'=>'SControllers,SOpenable',
            'PARAMS'=>array(
                array(
                    'PARAM_NAME'=>'action_type',
                    'PARAM_TITLE'=>LANG_DEVICES_LINK_ACTION_TYPE,
                    'PARAM_TYPE'=>'select',
                    'PARAM_OPTIONS'=>array(
                        array('TITLE'=>LANG_DEVICES_LINK_TYPE_TURN_ON,'VALUE'=>'turnon'),
                        array('TITLE'=>LANG_DEVICES_LINK_TYPE_TURN_OFF,'VALUE'=>'turnoff'),
                        array('TITLE'=>LANG_DEVICES_LINK_TYPE_SWITCH,'VALUE'=>'switch'),
                        array('TITLE'=>LANG_DEVICES_LINK_TYPE_OPEN,'VALUE'=>'open'),
                        array('TITLE'=>LANG_DEVICES_LINK_TYPE_CLOSE,'VALUE'=>'close'),
                        )
                ),
                array(
                    'PARAM_NAME'=>'action_delay',
                    'PARAM_TITLE'=>LANG_DEVICES_LINK_SWITCH_IT_PARAM_ACTION_DELAY,
                    'PARAM_TYPE'=>'num'
                )
            )
            ),
        array(
            'LINK_NAME'=>'set_color',
            'LINK_TITLE'=>LANG_DEVICES_LINK_SET_COLOR,
            'LINK_DESCRIPTION'=>LANG_DEVICES_LINK_SET_COLOR_DESCRIPTION,
            'TARGET_CLASS'=>'SRGB',
            'PARAMS'=>array(
                array(
                    'PARAM_NAME'=>'action_color',
                    'PARAM_TITLE'=>LANG_DEVICES_LINK_SET_COLOR_PARAM_ACTION_COLOR,
                    'PARAM_TYPE'=>'color'
                ),
                array(
                    'PARAM_NAME'=>'action_delay',
                    'PARAM_TITLE'=>LANG_DEVICES_LINK_SWITCH_IT_PARAM_ACTION_DELAY,
                    'PARAM_TYPE'=>'num'
                )
            )
        )
    ),
    'SThermostats'=>array(
        array(
            'LINK_NAME'=>'thermostat_switch',
            'LINK_TITLE'=>LANG_DEVICES_LINK_THERMOSTAT_SWITCH,
            'LINK_DESCRIPTION'=>LANG_DEVICES_LINK_THERMOSTAT_SWITCH_DESCRIPTION,
            'TARGET_CLASS'=>'SControllers',
            'PARAMS'=>array(
                array(
                    'PARAM_NAME'=>'invert_status',
                    'PARAM_TITLE'=>LANG_DEVICES_LINK_THERMOSTAT_INVERT,
                    'PARAM_TYPE'=>'select',
                    'PARAM_OPTIONS'=>array(
                        array('TITLE'=>LANG_NO,'VALUE'=>'0'),
                        array('TITLE'=>LANG_YES,'VALUE'=>'1')
                    )
                )
            )
        )
    ),
    'SSensors'=>array(
        array(
            'LINK_NAME'=>'sensor_switch',
            'LINK_TITLE'=>LANG_DEVICES_LINK_SENSOR_SWITCH,
            'LINK_DESCRIPTION'=>LANG_DEVICES_LINK_SENSOR_SWITCH_DESCRIPTION,
            'TARGET_CLASS'=>'SControllers,SOpenable',
            'PARAMS'=>array(
                array(
                    'PARAM_NAME'=>'source_value_type',
                    'PARAM_TITLE'=>LANG_DEVICES_LINK_SENSOR_VALUE_TYPE,
                    'PARAM_TYPE'=>'select',
                    'PARAM_OPTIONS'=>array(
                        array('TITLE'=>LANG_DEVICES_LINK_SENSOR_VALUE_TYPE_CURRENT,'VALUE'=>''),
                        array('TITLE'=>LANG_DEVICES_LINK_SENSOR_VALUE_TYPE_MIN,'VALUE'=>'min'),
                        array('TITLE'=>LANG_DEVICES_LINK_SENSOR_VALUE_TYPE_AVG,'VALUE'=>'avg'),
                        array('TITLE'=>LANG_DEVICES_LINK_SENSOR_VALUE_TYPE_MAX,'VALUE'=>'max'),
                    )
                ),
                array(
                    'PARAM_VISIBLE_CONDITION'=>array(
                        'CHECK_PARAM_NAME'=>'source_value_type',
                        'CHECK_PARAM_CONDITION'=>'!=',
                        'CHECK_PARAM_VALUE'=>'',
                    ),
                    'PARAM_NAME'=>'source_value_time',
                    'PARAM_TITLE'=>LANG_DEVICES_LINK_SENSOR_VALUE_FOR_PERIOD,
                    'PARAM_TYPE'=>'duration'
                ),
                array(
                    'PARAM_NAME'=>'condition_type',
                    'PARAM_TITLE'=>LANG_DEVICES_LINK_SENSOR_SWITCH_PARAM_CONDITION,
                    'PARAM_TYPE'=>'select',
                    'PARAM_OPTIONS'=>array(
                        array('TITLE'=>LANG_DEVICES_LINK_SENSOR_SWITCH_PARAM_CONDITION_ABOVE,'VALUE'=>'above'),
                        array('TITLE'=>LANG_DEVICES_LINK_SENSOR_SWITCH_PARAM_CONDITION_BELOW,'VALUE'=>'below')
                    )
                ),
                array(
                    'PARAM_NAME'=>'condition_value',
                    'PARAM_TITLE'=>LANG_DEVICES_LINK_SENSOR_SWITCH_PARAM_VALUE,
                    'PARAM_TYPE'=>'num'
                ),
                array(
                    'PARAM_NAME'=>'action_type',
                    'PARAM_TITLE'=>LANG_DEVICES_LINK_ACTION_TYPE,
                    'PARAM_TYPE'=>'select',
                    'PARAM_OPTIONS'=>array(
                        array('TITLE'=>LANG_DEVICES_LINK_TYPE_TURN_ON,'VALUE'=>'turnon'),
                        array('TITLE'=>LANG_DEVICES_LINK_TYPE_TURN_OFF,'VALUE'=>'turnoff'),
                        array('TITLE'=>LANG_DEVICES_LINK_TYPE_OPEN,'VALUE'=>'open'),
                        array('TITLE'=>LANG_DEVICES_LINK_TYPE_CLOSE,'VALUE'=>'close'),
                    )
                )
            )
        ),
        array (
            'LINK_NAME'=>'sensor_pass',
            'LINK_TITLE'=>LANG_DEVICES_LINK_SENSOR_PASS,
            'LINK_DESCRIPTION'=>LANG_DEVICES_LINK_SENSOR_PASS_DESCRIPTION,
            'TARGET_CLASS'=>'SThermostats',
        )
    ),
    'SOpenClose' =>array(
        array (
            'LINK_NAME'=>'open_sensor_pass',
            'LINK_TITLE'=>LANG_DEVICES_LINK_SENSOR_PASS,
            'LINK_DESCRIPTION'=>LANG_DEVICES_LINK_SENSOR_PASS_DESCRIPTION,
            'TARGET_CLASS'=>'SOpenable',
        )
    )
);

$addons_dir=dirname(__FILE__).'/addons';
if (is_dir($addons_dir)) {
    $addon_files=scandir($addons_dir);
    foreach($addon_files as $file) {
        if (preg_match('/\_links\.php$/',$file)) {
            require($addons_dir.'/'.$file);
        }
    }
}