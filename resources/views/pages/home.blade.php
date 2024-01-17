@include('pages.layout.navbar')
@php
    $trips=App\Models\Trip::all();
    $locations=App\Models\Location::all();
@endphp

<style>
     @media(min-width:400px) {

        .navbar .navbar-expand-lg{
            flex-wrap:wrap;
        }
        .gg{
        }
         ul{
            display: flex;
            justify-content: space-evenly;
        }
        .navbarText{
            justify-content: space-evenly;
        }
        .con{
            max-width: 100%;
        }
        .workTypes{
            width: 100%;
        }
        .SuccessPantners{
            width: 100%
        }
        .FAQ{
            width: 100%;
        }
    }
</style>

<div class="bigContainer" dir="rtl">
    <div class="overlay"></div>
    <div class="searchBox">
        <h2>
            إحجز تذكرة رحلتك<span style="color:#F99A0E"> الآن ..!</span>
        </h2>
        <p>
            إبحث عن افضل الحجوزات سعرا ووقتا
        </p>

        <div class="searchContainer">
            <form action="{{route('trips.search')}}" method="POST">
                @csrf
            <div class="searchSeactionOne">
                <div>
                    بحث عن رحلات الحافلات
                </div>
                <div>
                    <label>
                        <input type="radio" value="cargo" 
                           />
                        ارسال طرود
                    </label>
                    <label>
                        <input type="radio" value="trip"
                           />
                        حجز تذكرة
                    </label>
                </div>
            </div>
            <div class="searchSeactionTwo">
                <select class="form-control" placeholder='from' name="location[location]">
                 @foreach ($locations as $location)
                     <option value="{{$location->id}}">{{$location->location}}</option>
                 @endforeach
                </select>
                <select class="form-control"  name="location[destination]">
                    @foreach ($locations as $location)
                     <option value="{{$location->id}}">{{$location->location}}</option>
                 @endforeach 
                </select>
                <input type="date" class='form-control' placeholder='تاريخ الحجز' name="location[date]"></input>
                <button
                    style="background-Color:#fb0102; color:white; border:none; border-radius:2px; padding:10px 25px;"
                    type="submit">بحث</button>
            </div>
        </div>
    </div>
</div>



<div class=sectionHowWork>
    <div class=sectionHowWorkHeader>كيف نعمل</div>
    <div class=workTypes>
        <div class=workType>
            <div class=sectionHowWorkIcon>

                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em"
                    width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z">
                    </path>
                </svg>
              
            </div>

            <h6 class='text-center'>الحجز والدفع </h6>

            <p class='text-center'>قم بالحجز والدفع بكل سهولة</p>
        </div>
        <div class=workType>
            <div class=sectionHowWorkIcon>
            
                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                    stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="m12 15 2 2 4-4"></path>
                    <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                    <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                </svg>
            </div>
            <h6 class='text-center'>اختيار رحلة</h6>

            <p class='text-center'>قم بإختيار الرحلة المناسبة لك</p>
        </div>
        <div class=workType>
            <div class=sectionHowWorkIcon>
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em"
                    width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0 0 11.6 0l43.6-43.5a8.2 8.2 0 0 0 0-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z">
                    </path>
                </svg>

        
            </div>

            <h6 class='text-center'>البحث عن رحلة</h6>

            <p class='text-center'>قارن بين نتائج البحث سعرا ومدة وصول</p>
        </div>
    </div>
</div>



{{-- partners --}}

<div class="sectionSuccess">
    <div class="sectionHowWorkHeader">شركاء النجاح</div>
    <div class="SuccessPantners">
        <div class="SuccessPantner">
            <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 15 15" height="2em" width="2em"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M5.07451 1.82584C5.03267 1.81926 4.99014 1.81825 4.94803 1.82284C4.10683 1.91446 2.82673 2.36828 2.07115 2.77808C2.02106 2.80525 1.97621 2.84112 1.93869 2.88402C1.62502 3.24266 1.34046 3.82836 1.11706 4.38186C0.887447 4.95076 0.697293 5.55032 0.588937 5.98354C0.236232 7.39369 0.042502 9.08728 0.0174948 10.6925C0.0162429 10.7729 0.0351883 10.8523 0.0725931 10.9234C0.373679 11.496 1.02015 12.027 1.66809 12.4152C2.32332 12.8078 3.08732 13.1182 3.70385 13.1778C3.85335 13.1922 4.00098 13.1358 4.10282 13.0255C4.2572 12.8581 4.5193 12.4676 4.71745 12.1643C4.80739 12.0267 4.89157 11.8953 4.95845 11.7901C5.62023 11.9106 6.45043 11.9801 7.50002 11.9801C8.54844 11.9801 9.37796 11.9107 10.0394 11.7905C10.1062 11.8957 10.1903 12.0269 10.2801 12.1643C10.4783 12.4676 10.7404 12.8581 10.8947 13.0255C10.9966 13.1358 11.1442 13.1922 11.2937 13.1778C11.9102 13.1182 12.6742 12.8078 13.3295 12.4152C13.9774 12.027 14.6239 11.496 14.925 10.9234C14.9624 10.8523 14.9813 10.7729 14.9801 10.6925C14.9551 9.08728 14.7613 7.39369 14.4086 5.98354C14.3003 5.55032 14.1101 4.95076 13.8805 4.38186C13.6571 3.82836 13.3725 3.24266 13.0589 2.88402C13.0214 2.84112 12.9765 2.80525 12.9264 2.77808C12.1708 2.36828 10.8907 1.91446 10.0495 1.82284C10.0074 1.81825 9.96489 1.81926 9.92305 1.82584C9.71676 1.85825 9.5391 1.96458 9.40809 2.06355C9.26977 2.16804 9.1413 2.29668 9.0304 2.42682C8.86968 2.61544 8.71437 2.84488 8.61428 3.06225C8.27237 3.03501 7.90138 3.02 7.5 3.02C7.0977 3.02 6.72593 3.03508 6.38337 3.06244C6.28328 2.84501 6.12792 2.61549 5.96716 2.42682C5.85626 2.29668 5.72778 2.16804 5.58947 2.06355C5.45846 1.96458 5.2808 1.85825 5.07451 1.82584ZM11.0181 11.5382C11.0395 11.5713 11.0615 11.6051 11.0838 11.6392C11.2169 11.843 11.3487 12.0385 11.4508 12.1809C11.8475 12.0916 12.352 11.8818 12.8361 11.5917C13.3795 11.2661 13.8098 10.8918 14.0177 10.5739C13.9852 9.06758 13.7993 7.50369 13.4773 6.21648C13.38 5.82759 13.2038 5.27021 12.9903 4.74117C12.7893 4.24326 12.5753 3.82162 12.388 3.5792C11.7376 3.24219 10.7129 2.88582 10.0454 2.78987C10.0308 2.79839 10.0113 2.81102 9.98675 2.82955C9.91863 2.881 9.84018 2.95666 9.76111 3.04945C9.71959 3.09817 9.68166 3.1471 9.64768 3.19449C9.953 3.25031 10.2253 3.3171 10.4662 3.39123C11.1499 3.6016 11.6428 3.89039 11.884 4.212C12.0431 4.42408 12.0001 4.72494 11.788 4.884C11.5759 5.04306 11.2751 5.00008 11.116 4.788C11.0572 4.70961 10.8001 4.4984 10.1838 4.30877C9.58933 4.12585 8.71356 3.98 7.5 3.98C6.28644 3.98 5.41067 4.12585 4.81616 4.30877C4.19988 4.4984 3.94279 4.70961 3.884 4.788C3.72494 5.00008 3.42408 5.04306 3.212 4.884C2.99992 4.72494 2.95694 4.42408 3.116 4.212C3.35721 3.89039 3.85011 3.6016 4.53383 3.39123C4.77418 3.31727 5.04571 3.25062 5.35016 3.19488C5.31611 3.14738 5.27808 3.09831 5.23645 3.04945C5.15738 2.95666 5.07893 2.881 5.01081 2.82955C4.98628 2.81102 4.96674 2.79839 4.95217 2.78987C4.28464 2.88582 3.25999 3.24219 2.60954 3.5792C2.42226 3.82162 2.20825 4.24326 2.00729 4.74117C1.79376 5.27021 1.61752 5.82759 1.52025 6.21648C1.19829 7.50369 1.01236 9.06758 0.97986 10.5739C1.18772 10.8918 1.61807 11.2661 2.16148 11.5917C2.64557 11.8818 3.15003 12.0916 3.5468 12.1809C3.64885 12.0385 3.78065 11.843 3.9138 11.6392C3.93626 11.6048 3.95838 11.5708 3.97996 11.5375C3.19521 11.2591 2.77361 10.8758 2.50064 10.4664C2.35359 10.2458 2.4132 9.94778 2.63377 9.80074C2.85435 9.65369 3.15236 9.71329 3.29941 9.93387C3.56077 10.3259 4.24355 11.0201 7.50002 11.0201C10.7565 11.0201 11.4392 10.326 11.7006 9.93386C11.8477 9.71329 12.1457 9.65369 12.3663 9.80074C12.5869 9.94779 12.6465 10.2458 12.4994 10.4664C12.2262 10.8762 11.8041 11.2598 11.0181 11.5382ZM4.08049 7.01221C4.32412 6.74984 4.65476 6.60162 5.00007 6.59998C5.34538 6.60162 5.67603 6.74984 5.91966 7.01221C6.16329 7.27459 6.30007 7.62974 6.30007 7.99998C6.30007 8.37021 6.16329 8.72536 5.91966 8.98774C5.67603 9.25011 5.34538 9.39833 5.00007 9.39998C4.65476 9.39833 4.32412 9.25011 4.08049 8.98774C3.83685 8.72536 3.70007 8.37021 3.70007 7.99998C3.70007 7.62974 3.83685 7.27459 4.08049 7.01221ZM9.99885 6.59998C9.65354 6.60162 9.3229 6.74984 9.07926 7.01221C8.83563 7.27459 8.69885 7.62974 8.69885 7.99998C8.69885 8.37021 8.83563 8.72536 9.07926 8.98774C9.3229 9.25011 9.65354 9.39833 9.99885 9.39998C10.3442 9.39833 10.6748 9.25011 10.9184 8.98774C11.1621 8.72536 11.2989 8.37021 11.2989 7.99998C11.2989 7.62974 11.1621 7.27459 10.9184 7.01221C10.6748 6.74984 10.3442 6.60162 9.99885 6.59998Z"
                    fill="currentColor"></path>
            </svg>
            <strong> Discord</strong>
        </div>
        <div class="SuccessPantner">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="2em"
                width="2em" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M417.534 310.746c154.872 4.207 274.084 22.042 384.678 78.14 15.627 8.013 34.46 19.433 40.67 33.859 5.81 13.424 2.404 41.473-7.413 48.484-13.824 10.018-41.673 14.826-56.099 7.413-113.8-58.905-235.013-77.738-360.634-72.729-50.288 2.004-100.777 11.42-150.265 21.037-32.257 6.411-58.904 2.805-68.32-30.454-10.218-35.262 14.826-53.294 44.879-58.904 67.518-12.02 135.839-21.237 172.503-26.847zm23.042 152.672c110.194 6.612 214.176 29.251 309.143 83.347 15.627 8.815 32.056 30.254 33.658 47.084 2.606 30.052-31.855 40.27-67.518 21.236-123.217-65.515-253.646-80.14-389.685-57.1-15.227 2.606-31.255 11.822-45.08 9.017-17.63-3.807-33.458-16.629-50.087-25.445 10.418-15.828 18.232-42.476 31.856-45.882 58.102-14.425 118.208-22.04 177.712-32.257zm-20.435 153.069c115.002 1.803 199.954 19.434 277.891 63.512 20.236 11.42 44.077 26.646 24.443 51.289-7.814 9.817-39.67 11.02-53.695 3.406C568.203 681 461.616 674.387 351.823 688.212c-18.232 2.204-36.465 10.418-53.895 8.615-16.63-1.803-32.257-13.023-48.286-20.034 11.019-13.424 20.236-36.063 33.659-38.868 53.294-11.82 107.99-17.23 136.84-21.438zM1024 512.104c0 141.248-50.089 262.062-150.064 362.036S653.348 1024.203 511.9 1024.203c-141.248 0-262.061-50.088-362.035-150.063S-.198 653.552-.198 512.104c0-141.248 50.088-262.062 150.063-362.036C250.041 50.092 370.653.005 511.901.005s262.062 50.088 362.036 150.063C973.913 250.044 1024 370.856 1024 512.104zm-64.109 0c0-124.018-43.675-229.603-131.027-316.955-87.153-87.354-192.939-131.03-316.957-131.03-123.818 0-229.604 43.677-316.957 131.029S63.921 388.086 63.921 512.104s43.677 230.004 131.029 317.959c87.354 87.955 192.938 132.032 316.956 132.032s229.604-44.077 316.956-132.032c87.354-87.955 131.029-193.941 131.029-317.959z">
                </path>
            </svg>

            <strong>Spotify</strong>
        </div>
        <div class="SuccessPantner">

            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="2em"
                width="2em" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M664.6 729.8c-9.6-2.6-21.198.8-35.398 10.201l-1.4 1.2c-23 23-64.8 34.6-124.2 34.6s-101.2-11.6-124.2-34.6c-9.6-9.6-29-9.6-38.6 0-10 10-10 28.6.6 39.2C384 816 437.6 832.6 509.8 832.6c75 0 135-18.8 169-52.8 4.8-4.8 7.6-11.8 7.6-19.2 0-6.8-2.4-13.4-6.4-18-4.6-8.4-10.8-11.6-15.4-12.8zM438.2 579.399c0-44.2-37.2-84.4-78.2-84.4s-78.2 40.2-78.2 84.4c0 42.4 35.8 78.2 78.2 78.2s78.2-35.8 78.2-78.2zm221.401-78.2c-42.4 0-78.2 35.8-78.2 78.2s35.8 78.2 78.2 78.2 78.2-35.8 78.2-78.2-35.8-78.2-78.2-78.2zm237-124.8c-25.6 0-55.6 11.6-75.8 28.6-68-43.2-159.8-70-267.2-77.8l50-167 140.2 33.6c4.2 51.8 50.4 95.599 102.801 95.599 55 0 103.2-48.2 103.2-103.2s-48.2-103.2-103.2-103.2c-37.8 0-76 23-92.8 54.6l-166.8-41.8-2.4-.2c-11.4 0-27.2 10-28.2 26.6l-66 204.2c-105.2 1.2-208.601 29.2-292.4 79.4-25-15.6-49.6-23.2-75-23.2-67.2 0-122 54.6-122 122 0 42 20.2 79.4 56.2 99.4V629.4c0 87.2 47 163.2 135.2 220 83 57.4 195.8 89 317.6 89s237.8-31.6 320.8-89c87.2-60.4 138.4-138.6 138.4-220v-26c26-22.8 52.8-63.6 52.8-105.2-.2-67.2-58-121.8-125.401-121.8zm65.4 128.201c0 11.4-6.401 27.6-17.001 39.6-12.6-33.4-36.4-65-74.6-99.4 7.6-3.2 16-5.4 26.4-5.4 38.401-.2 65.201 26.8 65.201 65.2zM905.8 629.399c0 78-59 137.201-107.8 172.801-84.8 52.2-184.399 79.8-288.199 79.8-107.2 0-212.2-29-288-79.6-74.8-49.8-114.2-109.6-114.2-173s39.4-123.2 114.2-173c77-51.2 177-79.6 281.8-79.6 107.2 0 212.2 29 288 79.6 74.6 49.799 114.199 109.6 114.199 173zM150.399 442.4c-32.2 25.6-59.6 59.8-78.8 98.6-7.8-12.599-14-25-14-36.4 0-38.4 26.8-65.2 65.2-65.2 13-.2 21 0 27.6 3zM800.2 186.401c0-26.2 20.4-46.6 46.6-46.6s46.601 20.4 46.601 46.6-20.4 46.6-46.6 46.6c-26.2-.2-46.601-20.6-46.601-46.6z">
                </path>
            </svg>

            <strong>Rddit</strong>

        </div>
    </div>
</div>



{{-- customer --}}

<div class="title">
    <h1>ماذا يقول عملائنا عنا</h1>
    <small>
        هذه قصة عملائنا الذين انضمو الينا بسرور كبير  عنداستخدام منصتنا
    </small>
    <div class="con" id="con">
 
    <div class="card">
        <div class="top">
            <img src="https://randomuser.me/api/portraits/men/96.jpg" alt="">
            <div class="name">
                <strong>Ahmed mohammed</strong>
                <small>Oman,Muscat</small>
            </div>
            <strong>4.5 <span class="material-symbols-outlined">
                star
                </span></strong>

        </div>
        <div class="message">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore
            quam nesciunt voluptate ipsa eaque aspernatur!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore
            quam nesciunt voluptate ipsa eaque aspernatur!

        </div>
    </div>
    <div class="card">
        <div class="top">
            <img src="https://randomuser.me/api/portraits/men/96.jpg" alt="">
            <div class="name">
                <strong>Ahmed mohammed</strong>
                <small>Oman,Muscat</small>
            </div>
            <strong>4.5 <span class="material-symbols-outlined">
                star
                </span></strong>

        </div>
        <div class="message">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore
            quam nesciunt voluptate ipsa eaque aspernatur!

        </div>
    </div>
    <div class="card">
        <div class="top">
            <img src="https://randomuser.me/api/portraits/men/96.jpg" alt="">
            <div class="name">
                <strong>Ahmed mohammed</strong>
                <small>Oman,Muscat</small>
            </div>
            <strong>4.5 <span class="material-symbols-outlined">
                star
                </span></strong>

        </div>
        <div class="message">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore
            quam nesciunt voluptate ipsa eaque aspernatur!

        </div>
    </div>

    <div class="card">
        <div class="top">
            <img src="https://randomuser.me/api/portraits/men/96.jpg" alt="">
            <div class="name">
                <strong>Ahmed mohammed</strong>
                <small>Oman,Muscat</small>
            </div>
            <strong>4.5 <span class="material-symbols-outlined">
                star
                </span></strong>

        </div>
        <div class="message">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore
            quam nesciunt voluptate ipsa eaque aspernatur!

        </div>
    </div>
    <div class="card">
        <div class="top">
            <img src="https://randomuser.me/api/portraits/men/96.jpg" alt="">
            <div class="name">
                <strong>Ahmed mohammed</strong>
                <small>Oman,Muscat</small>
            </div>
            <strong>4.5 <span class="material-symbols-outlined">
                star
                </span></strong>

        </div>
        <div class="message">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore
            quam nesciunt voluptate ipsa eaque aspernatur!

        </div>
    </div>
</div>
<div class="control">
    <div class="">
    <i class="fa fa-minus fa-2x" aria-hidden="true"></i>

    </div>
    <div class="">
        <span class="material-symbols-outlined" onclick="left()">
            arrow_left_alt
            </span>
            <span class="material-symbols-outlined" onclick="right()">
                arrow_right_alt
                </span>

</div>


</div>

</div>

<script>
        var elements = document.querySelectorAll('.card');

        function left() {
  console.log('gg');

  elements.forEach(function (element) {
    element.style.transition = "none";
    var currentTranslateX = parseInt(element.style.transform.replace("translateX(", "").replace("px)", ""), 10) || 0;
    var newX = currentTranslateX + 360;
    element.style.transform = "translateX(-" + newX + "px)";
  });
}

    function right() {
  console.log('gg');

  elements.forEach(function (element) {
    element.style.transition = "none";
    var currentTranslateX = parseInt(element.style.transform.replace("translateX(", "").replace("px)", ""), 10) || 0;
    var newX = currentTranslateX + 360;
    element.style.transform = "translateX(" + newX + "px)";
  });
}
</script>


{{-- FAQ --}}


<div class="FAQ">
    <div class="sectionSuccess" style="">
        <img
            src="data:image/png;base64,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">
        <div class="sectionHowWorkHeader">الأسئلة المطروحة</div>
        <div style="background-Color:white;padding:20px 10px;border-Radius:10px;min-width:80%" dir=rtl>
            <div>
                <div style="display:flex ; justify-Content:space-between" onclick="showanswer('q1')">
                    <div>
                        ماهو موقع على طول؟
                    </div>
                    <div>
                        <div class="questionIcon" >
                            <span class="material-symbols-outlined">
                                add
                                </span>

                        </div>
                        <div class="questionIcon" onClick="showanswer('q1')">
                          
                        </div>
                    </div>
                </div>
                <div class="questionAnswer" id="q1" >على طول موقع لحجوزات تذاكر الباصات وارسال الطرود بمختلف أحجامها بشكل آمن
                    وسريع وسهل الوصل إليه.</div>
                <hr />
            </div>
            <div>
                <div style="display:flex ; justify-Content:space-between" onclick="showanswer('q2')">
                    <div>
                        في أي بلد يمكن الإستفادة بخدمات موقع على طول؟
                    </div>
                    <div>
                        <div class="questionIcon" >
                            <span class="material-symbols-outlined">
                                add
                                </span>
                        </div>
                        <div class="questionIcon" >
                            <AiOutlineMinus />
                        </div>
                    </div>
                </div>
                <div class="questionAnswer" id="q2"> حاليا خدمتنا تشمل كلا من ( السعودية - الإمارات - سلطنة عُمان - اليمن).

                </div>
                <hr />

            </div>
            <div>
                <div style="display:flex ; justify-Content:space-between" onclick="showanswer('q3')">
                    <div>
                        كيف يمكن الحجز عبر الموقع ؟
                    </div>
                    <div>
                        <div class="questionIcon" >
                            <span class="material-symbols-outlined">
                                add
                                </span>
                        </div>
                        <div class="questionIcon">
                            <AiOutlineMinus />
                        </div>
                    </div>
                </div>
                <div class="questionAnswer" id="q3">يمكن ابحجز عبر طريقتين:
                    1- عن طريق الموقع الرسمي (على طول).
                    عن طريق موقع إحدى الشركات الناقلة الموقعه معنا.
                </div>
                <hr />

            </div>
            
                <div>
                    <div style="display:flex ; justify-Content:space-between" onclick="showanswer('q4')">
                        هل يمكن حجز تذكرة أو إرسال طرد بين دولتين غير متجاورتين بحجز واحد؟
                   
                    <div>
                        <div class="questionIcon" >
                            <span class="material-symbols-outlined">
                                add
                                </span>
                        </div>
                        <div class="questionIcon" >
                            <AiOutlineMinus />
                        </div>
                    </div>
                </div>
                <div class="questionAnswer" id="q4"> نعم ، وهذه تعتبر هذه إحدى مميزات موقع علر طول، حيث يمكنك الحجز والإرسال من
                    والى أي بلد ضمن الدول التي موقعه معنا بحجز واحد فقط.
                </div>
                <hr />

                <div style="display:flex ; justify-Content:space-between" onclick="showanswer('q5')">
                    <div>
                        من هي الفئه المستهدفه لخدمات موقع على طول؟
                    </div>
                   
                        <div class="questionIcon" >
                            <span class="material-symbols-outlined">
                                add
                                </span>
                        </div>
                        
                   
                </div>
                <div class="questionAnswer" id="q5"> يمكن لكل شخص أو مؤسسة أو شركة أو متجر إلكتروني أو محلات تجارية أو مكاتب
                    سياحية أو حج وعمرة أو مجموعات الإستفادة من خدمات موقعنا متى ما يريد.. </div>

                </div>
                <hr />
                <div style="display:flex ; justify-Content:space-between" onclick="showanswer('q6')">
                    <div>
                        هل هناك خدمات أخرى في موقع على طول؟ </div>
                    <div>
                        <div class="questionIcon" style=" display: (show[5] ? none : bloc) " 
                           >
                           <span class="material-symbols-outlined">
                            add
                            </span>
                        </div>
                        <div class="questionIcon" style="display:(show[5]?block:none)}}" 
                          >
                            <AiOutlineMinus />
                        </div>
                    </div>
                </div>
                <div class="questionAnswer" style="display:none;"  id="q6">
                    <p>
                    لدينا خدمات كثيرة سوف تضاف الى
                    موقعنا عما قريب إن شاء الله تعالى من ضمنها
                    إضافة دول جديدة.
                    توصيل من الباب الى الباب.
                    إستخراج تأشيرات.
                    تخليص جمركي.
                    نقل ثقيل.
                    نقل بحري.
                    نقل جوي.
                    إيجار سيارات.
                    جولات سياحية.


                </p>

                </div>
                <hr />
                <div style="display:flex;justify-Content:space-between" onclick="showanswer('q7')">
                    <div>
                        هل يوجد نظام تتبع في موقع على طول وكيف يمكن استخدامه؟
                    </div>
                    <div>
                        <div class="questionIcon" style=" display: (show[6] ? none : block)"
                      >
                      <span class="material-symbols-outlined">
                        add
                        </span>

                        </div>
                        <div class="questionIcon" style="display:(show[6]?block:none)" 
                           >
                            <AiOutlineMinus />
                        </div>
                    </div>
                </div>
                <div class="questionAnswer" id="q7"> نعم يوجد في موقعنا نظام تتبع
                    ويمكن لأي شخص معرفه خط الرحلة أو الطرد عن طريق إدخال رقم الحجز فقط.



                </div>
        </div>
    </div>
</div>



<script>
  function showanswer(id) {
  if (document.getElementById(id).style.display == 'flex') {
    document.getElementById(id).style.display = 'none';
  } else {
    document.getElementById(id).style.display = 'flex';
  }

  console.log(id);
}

</script>



@include('pages.layout.footer')