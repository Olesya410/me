<h3 class="mb-4" style="color: #000;">Отзывы о жилье</h3>
        <div class="reviews mb-4">
            @forelse($reviews as $review)
                <div class="card mb-3 border-dark" style="background-color: #fff;">
                    <h5 class="card-title mb-2" style="font-weight: bold;">{{ $review->user->name ?? 'Аноним' }}</h5>
                    <p class="card-text">{{ $review->review }}</p>
                </div>
            @empty
                <p class="text-muted" style="color: #555;">Нет отзывов.</p>
            @endforelse
        </div>

        @if(auth()->check())
            <div class="card border-dark" style="background-color: #fff;">
                <div class="card-header" style="background-color: #fff; color: #000; font-weight: bold;">
                    Оставьте отзыв о жилье
                </div>
                <form action="{{ route('listings.review', $listing->id) }}" method="POST" class="p-3">
                    @csrf
                    <div class="mb-3">
                        <label for="review" class="form-label" style="color: #000;">Ваш отзыв</label>
                        <textarea name="review" id="review" rows="4" class="form-control" placeholder="Напишите ваш отзыв..." style="background-color: #fff; color: #000; border-color: #000;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-dark">Отправить отзыв</button>
                </form>
            </div>
        @endif