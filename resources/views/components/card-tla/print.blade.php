<section class="component component-card-tla" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

    <div class="component-card-tla__wrapper">
        <h3 class="component-card-tla__title">Indice</h3>
        <ul class="component-card-tla__list">


    {{--
            <li class="component-card-tla__item">
                <a href="#" class="component-card-tla__item__link">
                    <strong class="component-card-tla__item__highlighted">Capitulo I:</strong>
                    <span class="component-card-tla__item__text">Del consejo profesional de Cs. Economicas.</span>
                </a>
            </li>
            <li class="component-card-tla__item">
                <a href="#" class="component-card-tla__item__link">
                    <strong class="component-card-tla__item__highlighted">Capitulo I:</strong>
                    <span class="component-card-tla__item__text">Del consejo profesional de Cs. Economicas.</span>
                </a>
            </li>
            <li class="component-card-tla__item">
                <a href="#" class="component-card-tla__item__link">
                    <strong class="component-card-tla__item__highlighted">Capitulo I:</strong>
                    <span class="component-card-tla__item__text">Del consejo profesional de Cs. Economicas.</span>
                </a>
            </li>
            <li class="component-card-tla__item">
                <a href="#" class="component-card-tla__item__link">
                    <strong class="component-card-tla__item__highlighted">Capitulo I:</strong>
                    <span class="component-card-tla__item__text">Del consejo profesional de Cs. Economicas.</span>
                </a>
            </li>
            <li class="component-card-tla__item">
                <a href="#" class="component-card-tla__item__link">
                    <strong class="component-card-tla__item__highlighted">Capitulo I:</strong>
                    <span class="component-card-tla__item__text">Del consejo profesional de Cs. Economicas.</span>
                </a>
            </li>
            <li class="component-card-tla__item">
                <a href="#" class="component-card-tla__item__link">
                    <strong class="component-card-tla__item__highlighted">Capitulo I:</strong>
                    <span class="component-card-tla__item__text">Del consejo profesional de Cs. Economicas.</span>
                </a>
            </li>
            <li class="component-card-tla__item">
                <a href="#" class="component-card-tla__item__link">
                    <strong class="component-card-tla__item__highlighted">Capitulo I:</strong>
                    <span class="component-card-tla__item__text">Del consejo profesional de Cs. Economicas.</span>
                </a>
            </li> --}}


        </ul>
    </div>
</section>


<script type="text/javascript">

    $(document).ready(function() {

        var list = $('.component-card-tla[data-content-id="{{$id}}"] .component-card-tla__list');

        var ix = 0;

        var isInsideTab = !!list.closest('.tabcontent').length;
        var $elements;

        if (isInsideTab) {
            $elements = list.closest('.tabcontent').find('.holder-main .component h2, .holder-main .component h3');
        } else {
            $elements = $('.holder-main .component h2, .holder-main .component h3');
        }

        $($elements).each(function(){
            ix++;
            
            var id = 'p_{{$id}}_' + ix;

            // var el  = $(this).find('.component-text-th-1c-regular__title');
            // var el  = $(this).find('h2,h3');
            var el  = $(this);
                el.attr('id',id);

            var indexClass = '';
            if(el.is('h2')){
                indexClass = 'title';
            }
            else if(el.is('h3')){
                indexClass = 'subtitle';
            }


            var html = el.text();
            if(html !== undefined){
                var item = $('<li class="component-card-tla__item '+indexClass+'"><a href="#'+id+'" class="component-card-tla__item__link"><span class="component-card-tla__item__text">'+html+'</span></a></li>');
                    item.appendTo(list);
            }

        })

        list.find('.component-card-tla__item a').on('click',function(e){
            e.preventDefault();
            var id = $(this).attr('href');
            $([document.documentElement, document.body]).animate({
                scrollTop: $(id).offset().top - $('.main-header__primary-nav').outerHeight() - 80
            }, 1000);
        });

    });

    

</script>