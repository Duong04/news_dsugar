@extends('clients.layouts.master')

@section('header')
    <x-layouts-client.header />
@endsection

@section('content')
    <section class="py-5">
        <div class="container-md d-flex flex-column flex-lg-row mx-auto">
            <article class="col-12 col-lg-8">
                <div class="d-flex flex-column g-30 mt-4">
                    @foreach ($postPaginates as $item)
                    <x-posts.post-list-view :post="$item" />
                    @endforeach
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination d-flex justify-content-center mt-3">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </article>
            <x-layouts-client.aside />
        </div>
    </section>
@endsection

@section('footer')
    <x-layouts-client.footer />
@endsection
