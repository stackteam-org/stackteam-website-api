import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header'; 
import List from '@editorjs/list'; 
import ImageTool from '@editorjs/image';

let saveBtn = document.getElementById('save-data');

if(saveBtn) {
  let imageUploadUrl = saveBtn.dataset.image_upload;
  console.log(imageUploadUrl);

  addEventListener('click', (e) => {
    e.preventDefault();
    let aTag = e.target;
    const url = aTag.getAttribute('href');

    editor.save().then((outputData) => {
      // console.log('Article data: ', outputData)
            axios({
              method: 'post',
              url: url,
              data: { text: outputData }
        });
    }).catch((error) => {
      console.log('Saving failed: ', error)
    });
    
    console.log(url);
  }, false);
}

const editor = new EditorJS({
    /**
     * Id of Element that should contain Editor instance
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
            byFile: 'http://localhost:8008/uploadFile', // Your backend file uploader endpoint
            byUrl: 'http://localhost:8008/fetchUrl', // Your endpoint that provides uploading by Url
          }
        }
      }
    }, 
  });

 