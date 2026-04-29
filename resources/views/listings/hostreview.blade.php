<h3 class="mb-4 mt-5" style="color: #000;">Отзывы о арендодателе</h3>
<div class="host-reviews mb-4">
    @forelse($hostReviews as $hostReview)
        <div class="card mb-3 border-dark" style="background-color: #fff;">
                <h5 class="card-title mb-2" style="font-weight: bold;">{{ $hostReview->user->name ?? 'Аноним' }}</h5>
                <p class="card-text">{{ $hostReview->review }}</p>
        </div>
    @empty
        <p class="text-muted" style="color: #555;">Нет отзывов о арендодателе.</p>
    @endforelse
</div>

@if(auth()->check())
    <div class="card border-dark" style="background-color: #fff;">
        <div class="card-header" style="background-color: #fff; color: #000; font-weight: bold;">
            Оставьте отзыв о арендодателе
        </div>
        <form action="{{ route('listings.hostreview', $listing->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="host_review" class="form-label" style="color: #000;">Ваш отзыв</label>
                <textarea name="review" id="host_review" rows="4" class="form-control" placeholder="Напишите отзыв о арендодателе..." style="background-color: #fff; color: #000; border-color: #000;"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-dark">Отправить отзыв</button>
        </form>
    </div>
@endif