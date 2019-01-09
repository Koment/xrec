//<![CDATA[
$(document).ready(function(){
    "use strict";
    new jPlayerPlaylist({
        jPlayer: "#musica-jquery-jplayer",
        cssSelectorAncestor: "#musica-audio-player-container"
    }, [

		{
            title:"STROK1N x Mr.Cardy - Твои губы тают",
            artist:"<span class='music-time'>03:37</span>",
            mp3:"./strokin-mr-cardy-tvoi-guby-ta-you-t.mp3",
            poster: "../images/poster/*.jpg",

        },
		{
            title:"Двэ Барцухи и Кыргыз - Пушистик",
            artist:"<span class='music-time'>03:00</span>",
            mp3:"../../artists/2-barcuhi/music/Dve-barcuhi-i-kyrgyz-pushistik.mp3",
            poster: "../images/poster/*.jpg",

        },
        {
            title:"NONE Sense - FreeDom",
            artist:"<span class='music-time'>02:59</span>",
            mp3:"None-sense-Freedom.mp3",
            poster: "../images/poster/*.jpg",

        },
        {
            title:"Двэ Барцухи - В Клубэ",
            artist:"<span class='music-time'>02:50</span>",
            mp3:"../music/Dve-barcuhi-v-klube.mp3",
            poster: "../images/poster/*.jpg",

        },
		{
            title:"Двэ Барцухи - Жюх-жюх-жюх",
            artist:"<span class='music-time'>02:05</span>",
            mp3:"../music/Dve-barcuhi-v-klube-juh-juh-juh.mp3",
            poster: "../images/poster/*.jpg",

        },
		{
            title:"А.Крайм x Наглый – Мир для двоих",
            artist:"<span class='music-time'>03:08</span>",
            mp3:"../music/ACrime-Nagliy-mir-dlya-dvoih.mp3",
            poster: "../images/poster/*.jpg",

        },
		{
            title:"Анастасия - Быть единственной",
            artist:"<span class='music-time'>04:04</span>",
            mp3:"../music/Anastasiya-byt-dlya-nego-edinstvennoi.mp3",
            poster: "../images/poster/*.jpg",

        },
		{
            title:"BALAK - Final Round",
            artist:"<span class='music-time'>02:04</span>",
            mp3:"../music/BALAK-final.mp3",
            poster: "../images/poster/*.jpg",

        },
		{
            title:"HVRDCXRE - Надоело",
            artist:"<span class='music-time'>01:48</span>",
            mp3:"../music/HVRDCXRE-nadoelo.mp3",
            poster: "../images/poster/*.jpg",

        },
		{
            title:"Mortu x Друг x НнН - Помню",
            artist:"<span class='music-time'>02:53</span>",
            mp3:"../music/Mortu-Drug-NnN-pomnu.mp3",
            poster: "../images/poster/*.jpg",

        },
		{
            title:"Muaviya - Over",
            artist:"<span class='music-time'>03:58</span>",
            mp3:"../music/Muaviya-Over.mp3",
            poster: "../images/poster/*.jpg",

        },
		// {
    //         title:"Наглый x OC3.1 - Последний бой",
    //         artist:"<span class='music-time'>04:08</span>",
    //         mp3:"../music/Nagliy-Os-poslednii-boi.mp3",
    //         poster: "../images/poster/*.jpg",
    //
    //     }


    ], {
        playlistOptions: {
            autoPlay: false,
            loopOnPrevious: true,
            shuffleOnLoop: true,
            enableRemoveControls: true,
            displayTime: "show",
            freeItemClass: "jp-playlist-item-free",
        },
        swfPath: "../js/jquery.jplayer.swf",
        supplied: "oga, mp3",
        wmode: "window",
        useStateClassSkin: true,
        autoBlur: true,
        smoothPlayBar: true,
        keyEnabled: true,
        remainingDuration: true,
        volume: 1,
    });



});
//]]>
