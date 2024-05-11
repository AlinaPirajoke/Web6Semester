
const PhotoAlbum = {
    data() {
        return {
            photos: [
                {
                    title: 'Фотография с космонавтом',
                    photo: '…/assets/img/image1.jpg',
                    alt: 'Альтернативный текст',
                    comment: 'Комментарий к фотографии'
                }, {
                    title: 'Фотография с пирамидами',
                    photo: '…/assets/img/image2.jpg',
                    alt: 'Альтернативный текст',
                    comment: 'Комментарий к фотографии'
                },
            ]
        }
    },
    props: ['package'],
    template: `
                <li>
                    <img :src="package.photo" :alt="package.alt"> 
                </li>
              `
};
app.component('album-item', {})

const app = Vue.createApp(PhotoAlbum);
app.mount('#middleDiv');
