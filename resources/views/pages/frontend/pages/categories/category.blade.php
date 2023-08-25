<div class="categorie_banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="categorie_banner_title">
                    <h3>Top Categories</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="categorie_banner_active owl-carousel">
                @forelse ($CategoriesIndex as $items)
                    <div class="col-lg-3">
                        <div class="single_categorie_banner">
                            <div class="categorie_banner_thumb">
                                @if ($items->photo)
                                    <img src="{{ asset('storage/Attachments/Category-Attachments/' . $items->photo) }}"
                                        alt="{{ $items->name }}" />
                                @else
                                    <img src="{{ asset('asset/backend/src/img/team/empty-thumb.png') }}"
                                        alt="{{ $items->name }}" />
                                @endif
                                <div class="categorie_banner_content">

                                    <ul>
                                        <h3>
                                            <li> <a href="{{ route('collections.categoriesSlug' , $items->slug) }}">{{ $items->name }}</a></li>
                                        </h3>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse


            </div>
        </div>
    </div>
</div>
