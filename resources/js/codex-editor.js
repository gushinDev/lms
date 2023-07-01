import EditorJS from '@editorjs/editorjs';
import Header from "@editorjs/header";
import List from "@editorjs/list";
import Checklist from "@editorjs/checklist";
import Link from "@editorjs/link";

let form = document.querySelector('#create-post-form');

const editor = new EditorJS({
    holderId: 'editorjs',
    tools: {
        header: {
            class: Header,
        },
        list: {
            class: List,
        },
        checklist: {
            class: Checklist,
        },
        link: {
            class: Link
        }
    },
});

form.addEventListener('submit', function (e) {
    e.preventDefault();
    const url = form.getAttribute('action')
    const inputTitle = document.querySelector('#title').value;
    const shortDescription = document.querySelector('#short_description').value;
    editor.save().then((outputData) => {
        axios.post('http://localhost/api/posts', {
            title: inputTitle,
            short_description: shortDescription,
            content_data: outputData
        }).then(function (response) {
            console.log(response);
        }).catch(function (error) {
            console.log(error);
        });
    })
})
