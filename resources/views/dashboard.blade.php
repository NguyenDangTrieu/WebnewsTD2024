<x-app-layout>
    <div class="col-md-9">
                <div class="row">
                    @if ($articles->isEmpty())
                        <p class="col-12">No articles found</p>
                    @else
                        @foreach ($articles as $article)
                            <div class="col-12 mb-4">
                                <div class="news-item p-3 bg-white rounded shadow-sm">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if (!empty($article->thumbnail))
                                                <div class="image-container">
                                                    <img src="{{ $article->thumbnail }}" alt="News Image" class="img-fluid rounded">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <a href="{{ route('articles.show', $article->id) }}"><h5 class="news-title">{{ $article->title }}</h5></a>
                                            <p class="news-content">{{ $article->shortcut }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
</x-app-layout>
