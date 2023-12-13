import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';
import List from '@editorjs/list';
import ImageTool from '@editorjs/image';

let saveBtn = document.getElementById('save-data');
console.log(saveBtn.getAttribute("image-url"));

const editor = new EditorJS({
  /**
ment that should contain Editor instance
   */
  holder: 'editorjs',


  tools: {
    header: {
      class: Header,
      inlineToolbar: ['link']
    },
    list: {
      class: List,
      inlineToolbar: true
    },
    image: {
      class: ImageTool,
      config: {
        endpoints: {
          byFile: saveBtn.getAttribute("image-url"), // Your backend file uploader endpoint
          byUrl: saveBtn.getAttribute("image-url"), // Your endpoint that provides uploading by Url
        }
      }
    }
  },
});


  saveBtn.addEventListener('click', (e) => {
    e.preventDefault();

    editor.save().then((outputData) => {

      $('input[name="text"]').val(JSON.stringify(outputData));

      $('.myform').submit();

    }).catch((error) => {
      console.log('Saving failed: ', error)
    });
  }, false);



