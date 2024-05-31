ClassicEditor.create(document.querySelector('.editor'), {
	fontFamily: {
		options: [
			'default',
			'ARSMaquettePro-Black',
			'ARSMaquettePro-Medium',
			'ARSMaquettePro-Bold',
			'ARSMaquettePro-Regular'
		],
		supportAllValues: true
	},
	fontSize:{
		options: [
			'default',
			{
				title: 'X Small',
				model: '12px'
			},
			{
				title: 'Small',
				model: '14px'
			},
			{
				title: 'Medium',
				model: '16px'
			},
			{
				title: 'Large',
				model: '18px'
			},
			{
				title: 'X Large',
				model: '20px'
			},
			{
				title: '2 X Large',
				model: '22px'
			},
			{
				title: '3 X Large',
				model: '24px'
			},
			{
				title: '4 X Large',
				model: '26px'
			},
			{
				title: '5 X Large',
				model: '28px'
			},
			{
				title: '6 X Large',
				model: '30px'
			}
			
		],
		supportAllValues: true
	},
	toolbar: {
		items: [
			'heading',
			'|',
			'bold',
			'italic',
			'underline',
			'|',
			'fontFamily',
			'fontSize',
			'fontColor',
			'fontBackgroundColor',
			'|',
			'alignment',
			'bulletedList',
			'numberedList',
			'indent',
			'outdent',
			'|',
			'link',
			'blockQuote',
			'insertTable',
			'mediaEmbed',
			'|',
			'undo',
			'redo',
			'|',
			'horizontalLine',
			'removeFormat',
			'specialCharacters',
			'imageUpload'
		]
	},
	language: 'en',
	image: {
		toolbar: [
			'imageTextAlternative',
			'imageStyle:full',
			'imageStyle:side'
		]
	},
	table: {
		contentToolbar: [
			'tableColumn',
			'tableRow',
			'mergeTableCells',
			'tableCellProperties'
		]
	},
	licenseKey: '',

})
.then(editor => {
	window.editor = editor;




})
.catch(error => {
	console.error('Oops, something gone wrong!');
	console.error('Please, report the following error in the https://github.com/ckeditor/ckeditor5 with the build id and the error stack trace:');
	console.warn('Build id: 9gy4eemykwt1-n1vr3d4oygyg');
	console.error(error);
});