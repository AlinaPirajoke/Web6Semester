<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoModel extends Model
{
    use HasFactory;

    public function photoModel(): array
    {
        return array(

            array(
                'descr' => "Выдра",
                'big_image' => "images/images/otter.png",
                'small_image' => "images/images_mini/otter.jpg"
            ),
            array(
                'descr' => "Озеро и горы",
                'big_image' => "images/images/lake1.jpg",
                'small_image' => "images/images_mini/lake1.jpg"
            ),
            array(
                'descr' => "Цветочки и гора",
                'big_image' => "images/images/mountains.jpeg",
                'small_image' => "images/images_mini/mountains.jpg"
            ),
            array(
                'descr' => "Красивое светлое местечко",
                'big_image' => "images/images/river1.jpg",
                'small_image' => "images/images_mini/river1.jpg"
            ),
            array(
                'descr' => "Озеро вобще жесть",
                'big_image' => "images/images/lake2.jpg",
                'small_image' => "images/images_mini/lake2.jpg"
            ),
            array(
                'descr' => "Пруд в парке",
                'big_image' => "images/images/river2.jpeg",
                'small_image' => "images/images_mini/river2.png"
            ),
            array(
                'descr' => "Ещё одно озеро, но на восходе",
                'big_image' => "images/images/lake3.jpg",
                'small_image' => "images/images_mini/lake3.jpg"
            ),
            array(
                'descr' => "Озеро, но уже с высоты",
                'big_image' => "images/images/lake4.jpeg",
                'small_image' => "images/images_mini/lake4.png"
            ),
            array(
                'descr' => "Да сколько тут горных озёр?",
                'big_image' => "images/images/lake5.jpg",
                'small_image' => "images/images_mini/lake5.png"
            ),
            array(
                'descr' => "Водопадик",
                'big_image' => "images/images/waterfall.jpg",
                'small_image' => "images/images_mini/waterfall.png"
            ),
            array(
                'descr' => "Море (уже не озеро)",
                'big_image' => "images/images/sea.jpg",
                'small_image' => "images/images_mini/sea.png"
            ),
            array(
                'descr' => "Болото какое-то",
                'big_image' => "images/images/swamp.webp",
                'small_image' => "images/images_mini/swamp.png"
            ),
            array(
                'descr' => "Мне кажется где-то я это уже видел",
                'big_image' => "images/images/mountains2.jpg",
                'small_image' => "images/images_mini/mountains2.jpg"
            ),
            array(
                'descr' => "Деревья отражаются в речке",
                'big_image' => "images/images/river3.jpg",
                'small_image' => "images/images_mini/river3.png"
            ),
            array(
                'descr' => "Поляна",
                'big_image' => "images/images/forest.webp",
                'small_image' => "images/images_mini/forest.png"
            )
        );
    }
}
