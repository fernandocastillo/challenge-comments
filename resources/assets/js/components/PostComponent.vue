<template>
  <div>
    <div class="py-16  px-4 sm:px-6 lg:px-8 bg-white overflow-hidden">
      <div class="max-w-max lg:max-w-7xl mx-auto">
        <div class="relative z-10 mb-8 md:mb-2 md:px-6">
          <div class="text-base max-w-prose lg:max-w-none">
            <h2 class="leading-6 text-indigo-600 font-semibold tracking-wide uppercase">Github Repository</h2>
            <a href="https://github.com/fernandocastillo/challenge-comments" target="_blank" class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">https://github.com/fernandocastillo/challenge-comments</a>
          </div>
        </div>
        <div class="relative">
          <svg class="hidden md:block absolute top-0 right-0 -mt-20 -mr-20" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
            <defs>
              <pattern id="95e8f2de-6d30-4b7e-8159-f791729db21b" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
              </pattern>
            </defs>
            <rect width="404" height="384" fill="url(#95e8f2de-6d30-4b7e-8159-f791729db21b)" />
          </svg>
          <svg class="hidden md:block absolute bottom-0 left-0 -mb-20 -ml-20" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
            <defs>
              <pattern id="7a00fe67-0343-4a3c-8e81-c145097a3ce0" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
              </pattern>
            </defs>
            <rect width="404" height="384" fill="url(#7a00fe67-0343-4a3c-8e81-c145097a3ce0)" />
          </svg>
          <div class="relative md:bg-white md:p-6">
            <div class="lg:grid lg:grid-cols-2 lg:gap-6">
              <div class="prose prose-indigo prose-lg text-gray-500 lg:max-w-none">
                <p>Ultrices ultricies a in odio consequat egestas rutrum. Ut vitae aliquam in ipsum. Duis nullam placerat cursus risus ultrices nisi, vitae tellus in. Qui non fugiat aut minus aut rerum. Perspiciatis iusto mollitia iste minima soluta id.</p>


              </div>
              <div class="mt-6 prose prose-indigo prose-lg text-gray-500 lg:mt-0">
                <p>Erat pellentesque dictumst ligula porttitor risus eget et eget. Ultricies tellus felis id dignissim eget. Est augue maecenas risus nulla ultrices congue nunc tortor.</p>


              </div>
            </div>
            <div class="mt-8 inline-flex rounded-md shadow">
              <div class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                Read More
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="grid grid-cols-7 gap-4 ">

      <div class="col-span-1 "></div>
      <div class="col-span-5 ">
        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Comments</p>
        <comment-list-component></comment-list-component>
      </div>

    </div>

  </div>
</template>

<script>
    export default {
    }
</script>
