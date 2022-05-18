@extends('.layouts/base')

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/cookies.css?v=') . time() }}>
@endsection

@section('content')
    <div class="container bg-light rounded">
        <h1>{{__('Cookie policy')}}</h1>
        <p>{{__('The purpose of this cookie policy is to inform you clearly and accurately about the cookies used on the Futpad website.')}}</p>
        
        <h3>{{__('What are the cookies?')}}</h3>

        <p>{{__('A cookie is a small piece of text that websites you visit send to your browser and that allows the website to remember information about your visit, such as your preferred language and other options, in order to facilitate your next visit and make the site more useful. Cookies play a very important role and contribute to a better browsing experience for the user.')}}</p>

        <h3>{{__('Types of cookies')}}</h3>

        <p>{{__('Depending on who manages the domain from which cookies are sent and the data obtained is processed, two types can be distinguished: own cookies and third-party cookies.')}}</p>

        <p>{{__('There is also a second classification according to the length of time they remain stored in the client’s browser, being session cookies or persistent cookies.')}}</p>

        <p>{{__('Finally, there is another classification with five types of cookies according to the purpose for which the data obtained are processed: technical cookies, personalisation cookies, analysis cookies, advertising cookies and behavioural advertising cookies.')}}</p>

        <p>{{__('For more information in this regard you can consult the Guide on the use of cookies from the Spanish Data Protection Agency.')}}</p>

        <h3>{{__('Cookies used on the website')}}</h3>

        <p>{{__('The following cookies are identified that are being used in this portal as well as their type and function:')}}</p>

        <p>{{__('The Futpad website uses Google Analytics, a web analytics service developed by Google, which allows the measurement and analysis of navigation on web pages. In your browser you will be able to see cookies from this service. According to the previous type, these are our own cookies, session cookies and analysis cookies.')}}</p>

        <p>{{__('Through web analytics information is obtained regarding the number of users accessing the web, the number of pages viewed, the frequency and repetition of visits, their duration, the browser used, the operator providing the service, the language, the terminal you use and the city to which your IP address is assigned. Information that enables a better and more appropriate service by this portal.')}}</p>

        <p>{{__('To ensure anonymity, Google will make your information anonymous by truncating the IP address before storing it, so that Google Analytics is not used to locate or collect personally identifiable information from site visitors. Google may only send the information collected by Google Analytics to third parties when it is legally obliged to do so. Under the Google Analytics terms of service, Google will not associate your IP address with any other data stored by Google.')}}</p>

        <p>{{__('Another cookie that is downloaded is a technical cookie called JSESSIONID. This cookie allows you to store a unique identifier per session through which it is possible to link data necessary to enable ongoing browsing.')}}</p>

        <p>{{__('Finally, a cookie called show_cookies is downloaded, own, technical and session type. It manages the user’s consent to the use of cookies on the website, in order to remember those users who have accepted them and those who have not, so that the former are not shown information at the top of the page about it.')}}<p>

        <h3>{{__('Acceptance of the cookie policy')}}</h3>

        <b>{{__("By clicking on the button 'Accept all cookies' or 'Accept only necessary cookies' it is assumed that you accept the use of cookies.")}}</b>
        
        <div class="buttons">
            <form action="{{route('home')}}"><button class="all-cookies">{{__('Accept all cookies')}}</button></form>
            <form action="{{route('home')}}"><button class="necesary-cookies">{{__('Accept only necesary cookies')}}</button></form>
            <form action="{{route('cookies')}}"><button class="deny-cookies">{{__('Deny cookies')}}</button></form>   
        </div>

    </div>
@endsection
