<x-app-layout title="Contact">

    <div class="container mb-auto mt-1">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="mb-3 p-3 text-bg-primary fs-3">
                    <i class="bi bi-info-circle"></i>
                    {{ config('app.name') }} Contact
                </div>

                <article>

                    <p>
                        Before contacting us, ensure you have read our
                        <a href="{{ route('pages', 'terms') }}">Terms Of Service</a> &amp;
                        <a href="{{ route('pages', 'privacy') }}">Privacy Policy</a>,
                        which covers typical questions asked by users.
                        If your query is not covered above, please use the form below. We ensure a timely response.
                    </p>

                    <p>
                        You can contact us directly using the details provided, or you can use the inquiry form below, and we will contact you as soon as we can!
                        <br><br>
                        In case of an emergency, you can email us at {{ env('contact', 'sfile') }} [@] gmail.com.
                    </p>

                </article>

            </div>
        </div>
    </div>

</x-app-layout>
