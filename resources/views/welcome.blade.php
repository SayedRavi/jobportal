
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIGMA-JOBS - Job Portal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('partial.head')
</head>

<body>
<!-- Spinner start -->
@include('partial.spinner')
<!-- Spinner End -->
 
<!-- Navbar start -->
@include('partial.Nav')
<!-- Navbar End -->

<!-- Carousel Start -->
@include('partial.carousel')
<!-- Carousel End -->


{{--@include('partial.searchJob')--}}


@include('partial.category')


@include('partial.jobListing')

{{--@include('partial.about')--}}

{{--@include('partial.clientSays')--}}

@include('partial.footer')



</body>

</html>
