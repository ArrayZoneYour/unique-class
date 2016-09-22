<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => ' :attribute 不是有效的URL地址',
    'after'                => ' :attribute 必须在 :date 之后！',
    'alpha'                => ' :attribute 只能包含数字！',
    'alpha_dash'           => ' :attribute 仅允许包含字母、数字、破折号（-）以及底线（_）',
    'alpha_num'            => ' :attribute 仅允许包含字母、数字',
    'array'                => ' :attribute 必须为数组',
    'before'               => ' :attribute 必须在 :date 之前',
    'between'              => [
        'numeric' => ' :attribute 必须在 :min 和 :max 之间',
        'file'    => ' :attribute 必须是 :min 和 :max 之间的文件',
        'string'  => ' :attribute 必须是 :min 和 :max 之间的值（不包含临界值）',
        'array'   => ' :attribute 必须在 :min 和 :max 之间',
    ],
    'boolean'              => ' :attribute 的值只能是true或false',
    'confirmed'            => ' :attribute 的值不同',
    'date'                 => ' :attribute 不是有效的日期值',
    'date_format'          => ' :attribute 格式不合法 :format.',
    'different'            => ' :attribute 和 :other 不能相同',
    'digits'               => ' :attribute 必须是数字 :digits ',
    'digits_between'       => ' :attribute 必须是 :min 和 :max 之间的数字.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => ' :attribute 必须是合法的邮箱地址',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => ' :attribute 必须为文件格式',
    'filled'               => ' :attribute 必填',
    'image'                => ' :attribute 必须为图片',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => ' :attribute 在 :other 中不存在',
    'integer'              => ' :attribute 必须是整数',
    'ip'                   => ' :attribute 必须是有效的IP地址',
    'json'                 => ' :attribute 必须是合法的JSON字符串',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => '该 :attribute 已经被占用',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
