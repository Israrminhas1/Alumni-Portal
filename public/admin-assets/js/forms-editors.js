/**
 * Form Editors
 */

'use strict';

(function () {
  // Snow Theme
  // --------------------------------------------------------------------
  const snowEditor1 = new Quill('#snow-editor-1', {
    bounds: '#snow-editor-1',
    modules: {
      formula: true,
      toolbar: '#snow-toolbar-1'
    },
    theme: 'snow'
  });
  const snowEditor2 = new Quill('#snow-editor-2', {
    bounds: '#snow-editor-2',
    modules: {
      formula: true,
      toolbar: '#snow-toolbar-2'
    },
    theme: 'snow'
  });

  // Bubble Theme
  // --------------------------------------------------------------------
  // const bubbleEditor = new Quill('#bubble-editor', {
  //   modules: {
  //     toolbar: '#bubble-toolbar'
  //   },
  //   theme: 'bubble'
  // });

  // Full Toolbar
  // --------------------------------------------------------------------
  // const fullToolbar = [
  //   [
  //     {
  //       font: []
  //     },
  //     {
  //       size: []
  //     }
  //   ],
  //   ['bold', 'italic', 'underline', 'strike'],
  //   [
  //     {
  //       color: []
  //     },
  //     {
  //       background: []
  //     }
  //   ],
  //   [
  //     {
  //       script: 'super'
  //     },
  //     {
  //       script: 'sub'
  //     }
  //   ],
  //   [
  //     {
  //       header: '1'
  //     },
  //     {
  //       header: '2'
  //     },
  //     'blockquote',
  //     'code-block'
  //   ],
  //   [
  //     {
  //       list: 'ordered'
  //     },
  //     {
  //       list: 'bullet'
  //     },
  //     {
  //       indent: '-1'
  //     },
  //     {
  //       indent: '+1'
  //     }
  //   ],
  //   [{ direction: 'rtl' }],
  //   ['link', 'image', 'video', 'formula'],
  //   ['clean']
  // ];
  // const fullEditor = new Quill('#full-editor', {
  //   bounds: '#full-editor',
  //   placeholder: 'Type Something...',
  //   modules: {
  //     formula: true,
  //     toolbar: fullToolbar
  //   },
  //   theme: 'snow'
  // });
})();
