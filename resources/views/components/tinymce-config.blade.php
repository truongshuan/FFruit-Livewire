<script>
    const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;
    tinymce.init({
    selector: '#editor',
    plugins: 'preview  importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
    editimage_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize fontsizeselect blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media link anchor codesample | ltr rtl',
    // toolbar_sticky: true,
    // toolbar_sticky_offset: isSmallScreen ? 102 : 108,
    fontsize_formats: '1px 8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    importcss_append: true,
    file_picker_types: 'image',
    file_picker_callback: (callback, value, meta) => {
      const input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
      input.onchange = function() {
        const file = this.files[0];
        const reader = new FileReader();
        reader.onload = function() {
          const id = 'blobid' + (new Date()).getTime();
          const blobCache = tinymce.activeEditor.editorUpload.blobCache;
          const base64 = reader.result.split(',')[1];
          const blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);
          callback(blobInfo.blobUri(), {
            title: file.name,
            alt: file.name,
          });
        };
        reader.readAsDataURL(file);
      };
      input.click();
    },
    height: 250,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic underline alignleft aligncenter alignright alignjustify | quicklink quickimage quicktable',
    noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image table',
    skin: useDarkMode ? 'oxide-dark' : 'oxide',
    content_css: useDarkMode ? 'dark' : 'default',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
    setup: function(editor) {
      editor.on('change', function(e) {
        window.livewire.emit('desc', editor.getContent());
      });
    }
    });
    // tinymce.init({
    //     selector:'#editor',
    //     height: 250,
    //     forced_root_block: false,
    //     plugins: [
    //     'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
    //     'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
    //     'table emoticons template paste help codesample'
    //     ],
    //     image_title : true,
    //     automatic_uploads: true,
    //     images_upload_url : '/public/',
    //     file_picker_types: 'image',
    //     file_picker_callback: function (cv, value, meta){
    //         var input = document.createElement('input');
    //         input.setAttribute('type', 'file');
    //         input.setAttribute('accept', 'image/*');
    //         input.onchange = function(){
    //             var file = this.files[0];
    //             var reader = new FileReader();
    //             reader.readAsDataURL(file);
    //             render.onload = function(){
    //                 var id = 'blobid'+(new Date()).getTime();
    //                 var blobCache = tinymce.activeEditor.editorUpload.blobCache;
    //                 var base64 = reader.result.split(',')[1];
    //                 var blobInfo = blobCache.create(id, file, base64);
    //                 blobCache.add(blobInfo);
    //                 cb(blobInfo.blobUri(), {title:file.name});
    //             };
    //         };
    //         input.click();
    //     },
    //     toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
    //     'bullist numlist outdent indent | link image | print preview media fullpage | ' +
    //     'forecolor backcolor emoticons | help | codesample',
    //     menu: {
    //         favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
    //     },
    //     menubar: 'favs file edit view insert format tools table help',
    //     setup: function(editor) {
    //       editor.on('change', function(e) {
    //           window.livewire.emit('desc', editor.getContent());
    //       });
    //     }
    // });
    tinymce.activeEditor.execCommand('mceCodeEditor');
</script>