$(function(){var n=$(".masonry").masonry();$(".js-ajax").on("click",function(){var a=$(".masonry").html();$(a).find(".item").each(function(){n.push($(this))})})});