<script>
// Colorpicker
(function(theme, $) {

theme = theme || {};

var instanceName = '__colorpicker';

var PluginColorPicker = function($el, opts) {
    return this.initialize($el, opts);
};

PluginColorPicker.defaults = {
};

PluginColorPicker.prototype = {
    initialize: function($el, opts) {
        if ( $el.data( instanceName ) ) {
            return this;
        }

        this.$el = $el;

        this
            .setData()
            .setOptions(opts)
            .build();

        return this;
    },

    setData: function() {
        this.$el.data(instanceName, this);

        return this;
    },

    setOptions: function(opts) {
        this.options = $.extend( true, {}, PluginColorPicker.defaults, opts );

        return this;
    },

    build: function() {
        this.$el.colorpicker( this.options );

        return this;
    }
};

// expose to scope
$.extend(theme, {
    PluginColorPicker: PluginColorPicker
});

// jquery plugin
$.fn.themePluginColorPicker = function(opts) {
    return this.each(function() {
        var $this = $(this);

        if ($this.data(instanceName)) {
            return $this.data(instanceName);
        } else {
            return new PluginColorPicker($this, opts);
        }

    });
}

}).apply(this, [window.theme, jQuery]);

    // Colorpicker
(function($) {

'use strict';

if ( $.isFunction($.fn[ 'colorpicker' ]) ) {

    $(function() {
        $('[data-plugin-colorpicker]').each(function() {
            var $this = $( this ),
                opts = {};

            var pluginOptions = $this.data('plugin-options');
            if (pluginOptions)
                opts = pluginOptions;

            $this.themePluginColorPicker(opts);
        });
    });

}

}).apply(this, [jQuery]);
</script>