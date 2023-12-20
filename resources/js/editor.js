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
  i18n: {
    /**
     * Text direction
     */
    direction: 'rtl',
    messages: {
      toolNames: {
        "Text": "متن",
        "Heading": "سر تیتر",
        "List": "لیست",
        "Warning": "هشدار",
        "Checklist": "چک لیست",
        "Quote": "نقل قول",
        "Code": "کد",
        "Delimiter": "خط فاصله",
        "Raw HTML": "درج HTML",
        "Table": "جدول",
        "Link": "لینک",
        "Marker": "مارکر",
        "Bold": "بولد",
        "Italic": "آیتالیک",
        "InlineCode": "کد در خط",
        "Filter": "فیلتر",
        "Image": "تصویر"
      },
    },
},

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

  data: {"time":1702981682459,"blocks":[{"id":"M-dus6hd_y","type":"header","data":{"text":"تست شماره یک","level":2}},{"id":"sjwWhkemhF","type":"paragraph","data":{"text":"یلیبلبیلتاهدمسب"}},{"id":"84JhILtqud","type":"paragraph","data":{"text":"یبلیابلخیابلعبیالهعبالهبعالهعبیال"}},{"id":"Er3I-XuYj0","type":"paragraph","data":{"text":"تعالل"}},{"id":"y3iwQ82UZz","type":"list","data":{"style":"ordered","items":["قثصق","صثقصث","قصثق","ثصصثق","صثق"]}},{"id":"rFnv8EV4o6","type":"image","data":{"file":{"url":"http://localhost:8000/storage/images/pexels-eberhard-grossgasteiger-1366919_1702981645.jpg"},"caption":"سییسیس","withBorder":false,"stretched":false,"withBackground":false}},{"id":"nw9LBFhhk7","type":"header","data":{"text":"تمتم","level":2}},{"id":"Qu9a90sgLi","type":"paragraph","data":{"text":"سیشسی"}}],"version":"2.28.2"}


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



