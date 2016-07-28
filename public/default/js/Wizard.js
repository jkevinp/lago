        $(".btn-wiz-li").each(function(index,obj){
             $(obj).css("width" ,  (100 / $(".btn-wiz").length) + "%");
        });

        $('.wiz').each(function(index,obj){
            $(obj).css("right" , "-" + (100 * index) + "%");
            if(index == 0){
                $(obj).append('<div class="btn-group btn-group-justified wiz-btn-group"><a href="#" class="btn-wiz-next btn btn-primary btn-lg btn-wiz-'+ index +' ">Next ></a></div>');
            }
            else if(index == $('.wiz').length -1){
                $(obj).append('<div class="btn-group btn-group-justified wiz-btn-group"><a href="#" class="btn btn-default btn-wiz-back btn-wiz-b'+ index +' btn-lg ">< Back</a></a></div>');
            
            }else{
                $(obj).append('<div class="btn-group btn-group-justified wiz-btn-group"><a href="#" class="btn btn-default btn-wiz-back btn-wiz-b'+ index +'  btn-lg ">< Back</a><a href="#" class="btn-wiz-next btn btn-primary btn-lg btn-wiz-'+ index +'">Next ></a></div>');
            }
        });

        $('.btn-wiz-next').click(function(e){
            if($(this).data('function')){
                var fn = $(this).data('function') + "()";
                console.log(fn);
                var result = eval(fn);
                console.log(result);
                if(!result){
                    e.preventDefault();
                    return;
                }
            }
            var target = $('.wiz.active').index() + 1;
            if(target > $('.wiz').length -1)return;
            var last = $('.wiz.active');
            var current = $('.wiz.active').index();
            $('.wiz').each(function(index,obj){
                $(obj).animate({right:  (100 * (target - index)) + "%"}, 300, function() {});
            });
            $('.btn-wiz-li.active').removeClass("active");
            $('.btn-wiz-li').eq(target).addClass("active");
            last.removeClass("active");
            $('.wiz').eq(target).addClass("active");
        });
        $('.btn-wiz-back').click(function(e){
             if($(this).data('function')){
                var fn = $(this).data('function') + "()";
                console.log(fn);
                var result = eval(fn);
                console.log(result);
                if(!result){
                    e.preventDefault();
                    return;
                }
            }
            var target = $('.wiz.active').index() -1;
            if(target < 0)return;
            var last = $('.wiz.active');
            var current = $('.wiz.active').index();
            $('.wiz').each(function(index,obj){
                $(obj).animate({right:  (100 * (target - index)) + "%"}, 300, function() {});
            });
            $('.btn-wiz-li.active').removeClass("active");
            $('.btn-wiz-li').eq(target).addClass("active");
            last.removeClass("active");
            $('.wiz').eq(target).addClass("active");
        });

        // $('.btn-wiz').click(function(e){
        //     var index = $(this).data('target');
        //     var last = $('.wiz.active');
        //     $('.btn-wiz.active').removeClass("active");
        //     $('.btn-wiz').eq(index).addClass("active");
        //     last.removeClass("active");
        //     $('.wiz').eq(index).addClass("active");
        // });

        $('.btn-wiz-li').first().addClass("active");