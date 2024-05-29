<x-app-layout title="Privacy Policy">

    <div class="container mb-auto mt-1">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="mb-3 p-3 text-bg-primary fs-3">
                    <i class="bi bi-info-circle"></i>
                    {{ config('app.name') }} Privacy Policy
                </div>

                <article>
                        <h1>Welcome to the {{ config('app.name') }} Privacy Policy</h1>
                        <p>When you use {{ config('app.name') }} services, you trust us with your information. This Privacy Policy is meant to help you understand what data we collect, why we collect it, and what we do with it. This is important; we hope you will take time to read it carefully.</p>
                        <h2>Information we collect</h2>
                        <p>We collect information to provide better services to all of our users. We collect information in the following ways:</p>
                        <ul>
                            <li><strong>Information you give us.</strong> For example, our services require you to sign up for a {{ config('app.name') }} Account. When you do, we’ll ask for personal information, like your name, email address, mobile phone number or Bank account number and some other data when you make a payment request on {{ config('app.name') }}.<br><br></li>
                            <li><strong>Information we get from your use of our services.</strong> We collect information about the services that you use and how you use them, like&nbsp;when you download a file from our site, or view and interact with our ads and content.<br>This information includes:<br><strong>1. Device information</strong><br><strong>2. Log information<br>3. Location information<br>4. Cookies and similar technologies</strong></li>
                        </ul>
                        <h2>How we use information we collect</h2>
                        <p>We use the information we collect from all of our services to provide, maintain, protect and improve them, to develop new ones, and to protect {{ config('app.name') }} and our users.</p>
                        <h2>Information you share</h2>
                        <p>Our services let you share information with others. Remember that when you share information publicly, it may be indexable by search engines like Google, Bing or Yandex. Our services provide you with different options on sharing and removing your content.</p>
                        <h2>Information we share</h2>
                        <p>We do not share personal information with companies, organizations and individuals outside of Sfile unless one of the following circumstances applies:</p>
                        <p><strong>1. With your consent</strong></p>
                        <p><strong>2. With domain administrators</strong></p>
                        <p><strong>3. For external processing</strong></p>
                        <p><strong>4. For legal reasons</strong></p>
                        <p>If you decide to no longer use our services, you can request to delete your account and data from our system.
                            follow the steps <a href="{{ route('user.profile.delete') }}">Delete My Account</a></p>
                        <h2>When this Privacy Policy applies</h2>
                        <p>Our Privacy Policy applies to all of the services offered by {{ config('app.name') }}.</p>
                        <p>Our Privacy Policy does not apply to services offered by other companies or individuals.</p>
                        <h2>Changes</h2>
                        <p>Our Privacy Policy may change from time to time. We will not reduce your rights under this Privacy Policy without your explicit consent. We will post any privacy policy changes on this page and, if the changes are significant, we will provide a more prominent notice (including, for certain services, email notification of privacy policy changes). We will also keep prior versions of this Privacy Policy in an archive for your review.</p>
                        <p>Last modified: Aug 17, 2017</p>
                </article>

            </div>
        </div>
    </div>

</x-app-layout>
