class ContentToggleButton extends elementorModules.frontend.handlers.Base {
   getDefaultSettings() {
      return {
      selectors: {
            button: '.elementor-content-toggle-button-btn',
            content: '.elementor-content-toggle-button-content-box',
         },
      };
   }

   getDefaultElements() {
      const selectors = this.getSettings( 'selectors' );
      return {
         $button: this.$element.find( selectors.button ),
         $content: this.$element.find( selectors.content ),
      };
   }

   bindEvents() {
      this.elements.$button.on( 'click', this.onButtonClick.bind( this ) );
   }

   onButtonClick( event ) {
      event.preventDefault();
      this.elements.$button.fadeOut().promise().done( () => {
         this.elements.$content.fadeIn();
      } );
   }
}