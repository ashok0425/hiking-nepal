<section class="container py-5 my-5">
    <div class="mx-auto" style="max-width: 800px;">
        <div class="head-lines text-center mb-5">
            <div class="head-line-bg"></div>
            <h2 class="mb-0 bg-light head-line-head">FREQUENTLY ASKED QUESTIONS
            </h2>
        </div>
    </div>

    <div class="accordion accordion-flush mx-auto" id="faqAccordion" style="max-width: 996px">
        @forelse($pageFaqs as $index => $faq)
            <div class="accordion-item brand-shadow mb-4 p-3">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold text-primary" type="button"
                        data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}" aria-expanded="false"
                        aria-controls="faq{{ $index }}">
                        {{ $faq['question'] }}
                    </button>
                </h3>
                <div id="faq{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {{ $faq['answer'] }}
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted">
                <p>No FAQs available.</p>
            </div>
        @endforelse
    </div>

</section>
