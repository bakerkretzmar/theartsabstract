import domReady from '@wordpress/dom-ready';
import { registerBlockStyle, unregisterBlockStyle } from '@wordpress/blocks';

domReady(() => {
    unregisterBlockStyle('core/button', 'outline');
    registerBlockStyle('core/button', { name: 'outline', label: 'Outline' });
});
