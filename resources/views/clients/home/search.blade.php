@extends('clients.layouts.master')

@section('header')
    <x-layouts-client.header />
@endsection

@section('content')
    <section class="py-5">
        <h3 class="container-md">Kết quả tìm kiếm "{{ request()->query('q') }}"</h3>
        <h5 class="container-md">Kết quả trả về tổng: {{$total}} bài viết</h5>
        <div class="container-md d-flex flex-column flex-lg-row mx-auto">
            <article class="col-12 col-lg-8">
                <div class="d-flex flex-column g-30 mt-4">
                    @php
                    $pagination = ceil($total / $limit);
                    @endphp
                    @foreach ($posts as $item)
                    <x-posts.post-list-view :post="$item" />
                    @endforeach
                </div>
                @if ($hasPage)
                <nav aria-label="Page navigation">
                    <ul class="pagination d-flex justify-content-center mt-3">
                        <li class="page-item">
                            <a class="page-link {{!$prevPage ? 'disabled' : ''}}" href="{{$prevPage}}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @for ($i = 1; $i <= $pagination; $i++)
                        <li class="page-item"><a class="page-link" href="?page={{$i}}&q={{$q}}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item">
                            <a class="page-link {{!$nextPage ? 'disabled' : ''}}" href="{{$nextPage}}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                @endif
            </article>
            <x-layouts-client.aside />
        </div>
    </section>
@endsection

@section('footer')
    <x-layouts-client.footer />
@endsection
