import EditorJS from '@editorjs/editorjs';
import Header from  "@editorjs/header";
import List from  "@editorjs/list";
import Checklist from  "@editorjs/checklist";
import Link from  "@editorjs/link";



const editor = new EditorJS({
    holderId : 'editorjs',
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
