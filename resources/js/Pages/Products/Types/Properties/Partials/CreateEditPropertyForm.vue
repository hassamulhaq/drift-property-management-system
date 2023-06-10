<template>
    <Alert
        :intent="alert.intent"
        :show="alert.show"
        :title="alert.title"
        :on-dismiss="() => alert.show = false"
    >
        <div v-if="typeof alert.messages === 'string'">
            <p>{{ alert.messages }}</p>
        </div>
        <div v-else>
            <p v-for="message in alert.messages">{{ message }}</p>
        </div>
    </Alert>

    <form @submit.prevent="storeProperty">
        <input type="hidden" name="status" id="status" value="published">
        <input type="hidden" name="product_type" id="product_type" value="6">

        <div class="lg:flex gap-3 mb-3">
            <div class="w-full lg:w-3/4 bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">General</h1>
                    <span class="text-xs">To start selling, all you need is a name, price, and image</span>
                </div>
                <div class="relative mb-3">
                    <InputLabel for="title" value="Title" />
                    <TextInput
                        id="title"
                        ref="title"
                        v-model="propertyData.title"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="title"
                    />
                </div>
                <div class="relative mb-3">
                    <InputLabel for="slug" value="Slug" />
                    <TextInput
                        id="slug"
                        ref="slug"
                        v-model="propertyData.slug"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="title"
                    />
                </div>
                <div class="relative mb-3">
                    <InputLabel for="short_description" value="Short Description" />
                    <TextareaInput
                        id="short_description"
                        ref="short_description"
                        v-model="propertyData.short_description"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="short_description"
                    />
                </div>
            </div>
            <div class="w-full lg:w-1/4 bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-4">
                    <label for="dropdownCategoriesButton" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Categories</label>
                    <button id="dropdownCategoriesButton" data-dropdown-toggle="dropdownCategories" class="w-full indigoBtn inline-flex items-center px-2.5 pb-2.5 pt-4 text-sm font-medium text-center text-gray-900 bg-transparent rounded-lg border border-1 border-gray-300 hover:bg-gray-100  focus:ring-indigo-500 focus:border-indigo-600 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800" type="button">
                        Choose Categories
                        <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownCategories" class="hidden z-10 w-60 bg-white rounded shadow-none border border-1 border-gray-300 dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 1310px);">
                        <div class="p-3">
                            <label for="input-group-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input type="text" id="input-group-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Search...">
                            </div>
                        </div>
                        <ul class="overflow-y-auto px-3 pb-3 h-48 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownCategoriesButton">
                            <li>No Data</li>
                        </ul>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="tags" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Tags (separated by comma)</label>
                    <input type="text" id="tags" name="tags" class="js-choices-unique w-full text-gray-900 rounded-md focus:ring-indigo-500 focus:border-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                </div>

                <div class="mb-4">
                    <span class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Add Attributes</span>
                    <!--                    <x-product-attribute-modal></x-product-attribute-modal>-->
                </div>
            </div>
        </div>

        <!-- Variants -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full lg:w-3/4 bg-white rounded-sm shadow-none sm:rounded-lg border rounded p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Variants</h1>
                    <span class="text-xs">Add variations of this product. Offer your customers different options for price, color, format, size, shape, etc.</span>
                </div>

            </div>
            <div class="w-full lg:w-1/4 bg-white rounded-sm shadow-none sm:rounded-lg border rounded p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Media</h1>
                    <span class="text-xs">Add images to your product</span>
                </div>
                <div class="mt-4 mb-2">
                    <button type="button" style="display: none;" class="text-sm px-5 py-2.5 text-center block w-full text-gray-700 bg-gray-100 border border-gray-300 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-indigo-600 font-medium rounded-lg dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Thumbnail
                    </button>
                    <div>
                        <div class="uploaded-files" id="uploaded-files">
                            <ol class="ol" id="ol"></ol>
                        </div>
                        <div class="UppyProgressBar" id="UppyProgressBar"></div>
                        <dashboard
                            :uppy="uppy"
                            :plugins="['Form, DropTarget, DragDrop']"
                            :props="
                        {
                            id: 'uppy',
                            theme: 'light',
                            autoProceed: false,
                            height: 500,
                            thumbnailWidth: 180,
                            animateOpenClose: true,
                            showProgressDetails: false,
                            allowMultipleUploadBatches: false,
                        }" />
                    </div>
                </div>
                <div class="mt-4 mb-2">
                    <!-- #MultiMediaDropzoneModal is in component media-form-multiple-dropzone -->
<!--                    <button type="button" data-modal-toggle="MultiMediaDropzoneModal" class="text-sm px-5 py-2.5 text-center block w-full text-gray-700 bg-gray-100 border border-gray-300 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-indigo-600 font-medium rounded-lg dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">-->
<!--                        Upload Gallery-->
<!--                    </button>-->
                </div>
            </div>
        </div>
        <!-- END Variants -->

        <!-- Information -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Information</h1>
                    <span class="text-xs"></span>
                </div>
                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5"></h6></div>
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid grid-cols-2 content-start gap-x-2 mb-2.5 mt-2.5">
                            <div class="mb-3">
                                <InputLabel for="price" value="Sale or Rent Price (Required)" />
                                <TextInput
                                    id="price"
                                    ref="price"
                                    v-model="propertyData.price"
                                    type="number"
                                    class="mt-1 block w-full"
                                    autocomplete="price"
                                />
                            </div>
                            <div class="mb-3">
                                <InputLabel for="second_price" value="Second Price (Optional)" />
                                <TextInput
                                    id="second_price"
                                    ref="second_price"
                                    v-model="propertyData.second_price"
                                    type="number"
                                    class="mt-1 block w-full"
                                    autocomplete="second_price"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="price_prefix" value="Price Prefix" />
                                <TextInput
                                    id="price_prefix"
                                    ref="price_prefix"
                                    v-model="propertyData.price_prefix"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="price_prefix"
                                />
                                <small>For example: Start from</small>
                            </div>
                            <div class="mb-4">
                                <InputLabel for="price_postfix" value="After The Price" />
                                <TextInput
                                    id="price_postfix"
                                    ref="price_postfix"
                                    v-model="propertyData.price_postfix"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="price_postfix"
                                />
                                <small>For example: Monthly</small>
                            </div>
                            <div class="mb-4">
                                <InputLabel for="area_size" value="Area Size (Digits)" />
                                <TextInput
                                    id="area_size"
                                    ref="area_size"
                                    v-model="propertyData.area_size"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="area_size"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="size_prefix" value="Size Postfix" />
                                <TextInput
                                    id="size_prefix"
                                    ref="size_prefix"
                                    v-model="propertyData.size_prefix"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="size_prefix"
                                />
                                <small>For example: Sq Ft</small>
                            </div>
                            <div class="mb-4">
                                <InputLabel for="land" value="Land Area (Digits)" />
                                <TextInput
                                    id="land"
                                    ref="land"
                                    v-model="propertyData.land"
                                    type="number"
                                    class="mt-1 block w-full"
                                    autocomplete="land"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="land_postfix" value="Land Area Size Postfix" />
                                <TextInput
                                    id="land_postfix"
                                    ref="land_postfix"
                                    v-model="propertyData.land_postfix"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="land_postfix"
                                />
                                <small>For example: Sq Ft</small>
                            </div>
                            <div class="mb-4">
                                <InputLabel for="bedrooms" value="Bedrooms" />
                                <TextInput
                                    id="bedrooms"
                                    ref="bedrooms"
                                    v-model="propertyData.bedrooms"
                                    type="number"
                                    class="mt-1 block w-full"
                                    autocomplete="bedrooms"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="rooms" value="Rooms" />
                                <TextInput
                                    id="rooms"
                                    ref="rooms"
                                    v-model="propertyData.rooms"
                                    type="number"
                                    class="mt-1 block w-full"
                                    autocomplete="rooms"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="rooms" value="Bathrooms" />
                                <TextInput
                                    id="bathrooms"
                                    ref="bathrooms"
                                    v-model="propertyData.bathrooms"
                                    type="number"
                                    class="mt-1 block w-full"
                                    autocomplete="bathrooms"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="garage" value="Garages" />
                                <TextInput
                                    id="garage"
                                    ref="garage"
                                    v-model="propertyData.garage"
                                    type="number"
                                    class="mt-1 block w-full"
                                    autocomplete="garage"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="garage_size" value="Garage Size" />
                                <TextInput
                                    id="garage_size"
                                    ref="garage_size"
                                    v-model="propertyData.garage_size"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="garage_size"
                                />
                                <small>For example: 200 Sq Ft</small>
                            </div>
                            <div class="mb-4">
                                <InputLabel for="year" value="Year Built" />
                                <TextInput
                                    id="year"
                                    ref="year"
                                    v-model="propertyData.year"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="year"
                                />
                                <small>For example: 2003</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Information -->

        <!-- Property Settings -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Property Settings</h1>
                    <span class="text-xs"></span>
                </div>
                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5"></h6></div>
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid grid-cols-2 content-start gap-x-2 mb-2.5 mt-2.5">

                            <div class="mb-3">
                                <label title="Rent On Property">Property type is <u>ROP</u>?</label>
                                <div class="flex items-center space-x-6">
                                    <div>
                                        <label for="false_property_type">No</label>
                                        <input
                                            type="radio"
                                            name="property_type"
                                            id="false_property_type"
                                            class="mt-1 block"
                                            checked
                                            v-model="propertyData.property_type"
                                        >
                                    </div>
                                    <div>
                                        <label for="true_property_type">Yes</label>
                                        <input
                                            type="radio"
                                            name="property_type"
                                            id="true_property_type"
                                            class="mt-1 block"
                                            v-model="propertyData.property_type"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <InputLabel for="address" value="Units" />
                                <TextInput
                                    id="units"
                                    ref="units"
                                    v-model="propertyData.units"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="units"
                                />
                                <small>Total no. of units.</small>
                            </div>

                            <div class="mb-4">
                                <label>Do you want to mark this property as featured?</label>
                                <div class="flex items-center space-x-6">
                                    <div>
                                        <label for="false_featured">No</label>
                                        <input
                                            type="radio"
                                            name="featured"
                                            id="false_featured"
                                            class="mt-1 block"
                                            checked
                                            value="0"
                                            v-model="propertyData.featured"
                                        >
                                    </div>
                                    <div>
                                        <label for="true_featured">Yes</label>
                                        <input
                                            type="radio"
                                            name="featured"
                                            id="true_featured"
                                            class="mt-1 block"
                                            value="1"
                                            v-model="propertyData.featured"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label>The user must be logged in to view this property?</label>
                                <div class="flex items-center space-x-6">
                                    <div>
                                        <label for="false_logged_in_to_view">No</label>
                                        <input
                                            type="radio"
                                            name="logged_in_to_view"
                                            id="false_logged_in_to_view"
                                            class="mt-1 block"
                                            checked
                                            value="0"
                                            v-model="propertyData.logged_in_to_view"
                                        >
                                    </div>
                                    <div>
                                        <label for="true_logged_in_to_view">Yes</label>
                                        <input
                                            type="radio"
                                            name="logged_in_to_view"
                                            id="true_logged_in_to_view"
                                            class="mt-1 block"
                                            value="1"
                                            v-model="propertyData.logged_in_to_view"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <InputLabel for="address" value="Street Address" />
                                <TextInput
                                    id="address"
                                    ref="address"
                                    v-model="propertyData.address"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="address"
                                />
                                <small>Street name and the building number...</small>
                            </div>
                            <div class="mb-3">
                                <InputLabel for="zip" value="Zip/Postal Code" />
                                <TextInput
                                    id="zip"
                                    ref="zip"
                                    v-model="propertyData.zip"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="zip"
                                />
                            </div>

                            <div class="mb-3">
                                <label for="rop_plan_duration"><u title="Rent On Property">ROP</u> plan duration.</label>
                                <select id="rop_plan_duration" v-model="propertyData.rop_plan_duration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="energy_class" data-selected="global">
                                    <option value="">Select Duration</option>
                                    <option value="1">1 year</option>
                                    <option value="2">2 year</option>
                                    <option value="3">3 year</option>
                                    <option value="4">4 year</option>
                                    <option value="5">5 year</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <InputLabel for="disclaimer" value="Disclaimer" />
                                <TextareaInput
                                    id="disclaimer"
                                    ref="disclaimer"
                                    v-model="propertyData.disclaimer"
                                    class="mt-1 block w-full"
                                    autocomplete="disclaimer"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Property Settings -->


        <!-- Stock & Inventory -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Stock & Inventory</h1>
                    <span class="text-xs">To start selling, all you need is a name, price, and image</span>
                </div>
                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5">General & Shipping</h6></div>
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid grid-cols-2 gap-x-2 mb-2.5 content-start mt-2.5">
                            <div class="mb-3">
                                <InputLabel for="sku" value="SKU" />
                                <TextInput
                                    id="sku"
                                    ref="sku"
                                    v-model="propertyData.sku"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="sku"
                                />
                                <small>Unique Stock Kyeong Unit</small>
                            </div>
                            <div class="mb-3">
                                <InputLabel for="product_number" value="Product Number" />
                                <TextInput
                                    id="product_number"
                                    ref="product_number"
                                    v-model="propertyData.product_number"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="product_number"
                                />
                                <small>Property Number</small>
                            </div>
                        </div>
                        <div class="flex-1 grid grid-cols-2 content-start gap-x-2 mb-2.5 mt-2.5"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Stock & Inventory -->

        <!-- Map -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Map</h1>
                    <span class="text-xs"></span>
                </div>
                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5"></h6></div>
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid grid-cols-2 content-start gap-x-2 mb-2.5 mt-2.5">
                            <div class="mb-4">
                                <label>Show Map?</label>
                                <div class="flex items-center space-x-6">
                                    <div>
                                        <label for="hide_map">Hide</label>
                                        <input
                                            type="radio"
                                            name="map"
                                            id="hide_map"
                                            class="mt-1 block"
                                            checked
                                            v-model="propertyData.map"
                                        >
                                    </div>
                                    <div>
                                        <label for="show_map">Show</label>
                                        <input
                                            type="radio"
                                            name="map"
                                            id="show_map"
                                            class="mt-1 block"
                                            v-model="propertyData.map"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <InputLabel for="map_address" value="Address" />
                                <TextInput
                                    id="map_address"
                                    ref="map_address"
                                    v-model="propertyData.map_address"
                                    type="url"
                                    class="mt-1 block w-full"
                                    autocomplete="map_address"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Map -->

        <!-- Contact Information -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Contact Information</h1>
                    <span class="text-xs"></span>
                </div>
                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5"></h6></div>
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid grid-cols-2 content-start gap-x-2 mb-2.5 mt-2.5">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Contact Information -->

        <!-- Property Documents -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Property Documents</h1>
                    <span class="text-xs"></span>
                </div>
                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5"></h6></div>
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid grid-cols-1 content-start gap-x-2 mb-2.5 mt-2.5">
                            <div class="mb-3">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">Attach PDF files, Map images OR other documents.</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" />
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Property Documents -->

        <!-- Energy Class -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Energy Class</h1>
                    <span class="text-xs"></span>
                </div>
                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5"></h6></div>
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid grid-cols-2 content-start gap-x-2 mb-2.5 mt-2.5">
                            <div class="mb-3">
                                <label for="energy_class">Energy Class</label>
                                <select id="energy_class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="energy_class" data-selected="global">
                                    <option value="">Select Energy Class</option>
                                    <option value="A+">A+</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <InputLabel for="energy_global_index" value="Global Energy Performance Index" />
                                <TextInput
                                    id="energy_global_index"
                                    ref="energy_global_index"
                                    v-model="propertyData.energy_global_index"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="energy_global_index"
                                />
                                <small>For example: 92.42 kWh / m²a</small>
                            </div>
                            <div class="mb-3">
                                <InputLabel for="renewable_energy_global_index" value="Renewable energy performance index" />
                                <TextInput
                                    id="renewable_energy_global_index"
                                    ref="renewable_energy_global_index"
                                    v-model="propertyData.renewable_energy_global_index"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="renewable_energy_global_index"
                                />
                                <small>For example: 00.00 kWh / m²a</small>
                            </div>
                            <div class="mb-3">
                                <InputLabel for="energy_performance" value="Energy performance of the building" />
                                <TextInput
                                    id="energy_performance"
                                    ref="energy_performance"
                                    v-model="propertyData.energy_performance"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="energy_performance"
                                />
                            </div>
                            <div class="mb-3">
                                <InputLabel for="epc_current_rating" value="EPC Current Rating" />
                                <TextInput
                                    id="epc_current_rating"
                                    ref="epc_current_rating"
                                    v-model="propertyData.energy_performance"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="epc_current_rating"
                                />
                            </div>
                            <div class="mb-3">
                                <InputLabel for="epc_current_rating" value="EPC Potential Rating" />
                                <TextInput
                                    id="epc_potential_rating"
                                    ref="epc_potential_rating"
                                    v-model="propertyData.epc_potential_rating"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="epc_potential_rating"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Energy Class -->

        <!-- Description -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h2 class="text-2xl text-grey-90">Description</h2>
                </div>
                <div class="relative mb-3">
                    <InputLabel for="description" value="Description" />
                    <TextareaInput
                        id="description"
                        ref="description"
                        rows="7"
                        v-model="propertyData.description"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="description"
                    />
                </div>
            </div>
        </div>
        <!-- END Stock & Inventory -->

        <!-- submit -->
        <div class="lg:flex gap-3 mb-3 mt-20 md:fixed md:bottom-1 md:right-8">
            <div class="w-full bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-4">
                    <h2 class="text-2xl text-grey-90">Publish/Draft</h2>
                </div>
                <div class="mb-2 mt-2">
                    <input type="submit" value="Publish" class="flex items-center justify-center cursor-pointer bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-indigo-50 text-white font-semibold h-10 px-6 rounded-lg w-full sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400">
                </div>
            </div>
        </div>
        <!-- submit -->
    </form>
</template>

<script>
import TextInput from "@/Components/TextInput.vue";
import FormSection from "@/Components/FormSection.vue";

import {ref} from "vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import {useForm} from "@inertiajs/vue3";
import TextareaInput from "@/Components/TextareaInput.vue";
import {PRODUCT_TYPES} from "@/Constants/ProductTypes";
import {PRODUCT_STATUS} from "@/Constants/Product";
import Alert from "@/Components/Alert.vue";
import Uppy from '@uppy/core'
import {Dashboard} from '@uppy/vue'
import XHRUpload from '@uppy/xhr-upload'

import "@uppy/core/dist/style.css"
import "@uppy/dashboard/dist/style.css"
import '@uppy/drop-target/dist/style.css'
import '@uppy/drag-drop/dist/style.css'
import '@uppy/progress-bar/dist/style.css'

export default {
    name: "CreateEditPropertyForm",
    components: {Alert, TextareaInput, InputError, InputLabel, PrimaryButton, ActionMessage, FormSection, TextInput, Dashboard},
    computed: {
        uppy: () => new Uppy()
            //.use(Form, {target: '#upload-form'})
            .on('complete', result => {
                //console.log('successful files:', result.successful)
                //console.log('failed files:', result.failed)
            })
            // .use(ProgressBar, {
            //     target: '#UppyProgressBar',
            //     hideAfterFinish: false,
            // })
            .use(XHRUpload, {
                //withCredentials: true,
                headers: {
                    "Accept": "application/json",
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
                },
                endpoint: route("media.upload"),
                formData: true,
                fieldName: 'files[]',
            })
            .on('upload-success', (file, response) => {
                let media = response.body[0].name
            })
    },
    beforeDestroy () {
        this.uppy.close({ reason: 'unmount' })
    },
    props: {
        product: {
            type: Object,
            required: false
        },
    },
    setup(props) {
        let alert = ref({
            title: '',
            show: false,
            intent: 'warning',
            messages: ''
        })
        const media = ref()


        // const uppy = new Uppy({ debug: true, autoProceed: true })
        // // uppy.use(ProgressBar, {
        // //     target: '.UppyProgressBar',
        // //     hideAfterFinish: false,
        // // })
        // uppy.use(XHRUpload, {
        //     endpoint: 'https://xhr-server.herokuapp.com/upload',
        //     formData: true,
        //     fieldName: 'files[]',
        // })
// And display uploaded files
//         uppy.on('upload-success', (file, response) => {
//             const url = response.uploadURL
//             const fileName = file.name
//
//             const li = document.createElement('li')
//             const a = document.createElement('a')
//             a.href = url
//             a.target = '_blank'
//             a.appendChild(document.createTextNode(fileName))
//             li.appendChild(a)
//
//             document.querySelector('.uploaded-files ol').appendChild(li)
//         })

        // const COMPANION_URL = "http://companion.uppy.io"
        // const COMPANION_ALLOWED_HOSTS = ['https://my-site.com']
        // const uppy = new Uppy({ logger: debugLogger })
        //     // The main UI that shows files, progress and holds all plugins
        //     .use(Dashboard, {
        //         target: '.DashboardContainer',
        //         inline: true,
        //         height: 470,
        //         metaFields: [
        //             { id: 'name', name: 'Name', placeholder: 'file name' },
        //             { id: 'caption', name: 'Caption', placeholder: 'add description' },
        //         ],
        //         note: 'Images and video only, 2–3 files, up to 1 MB',
        //     })
        //     .use(Form, { target: '#upload-form' })
        //     // Allow dropping files on any element or the whole document
        //     .use(DropTarget, { target: document.body })
        //
        // uppy.on('complete', result => {
        //     console.log('successful files:', result.successful)
        //     console.log('failed files:', result.failed)
        // })

        const propertyData = useForm({
            product_type: PRODUCT_TYPES.PRODUCT_TYPE_PROPERTY,
            title: props?.product?.property?.title || null,
            slug: props?.product?.property?.slug || null,
            short_description: props?.product?.property?.short_description || null,
            description: props?.product?.property?.description || null,
            tags: props?.product?.property?.tags || null,
            price: props?.product?.property?.price || null,
            second_price: props?.product?.property?.second_price || null,
            price_prefix: props?.product?.property?.price_prefix || null,
            price_postfix: props?.product?.property?.price_postfix || null,
            size: props?.product?.property?.size || null,
            size_prefix: props?.product?.property?.size_prefix || null,
            land: props?.product?.property?.land || null,
            land_postfix: props?.product?.property?.land_postfix || null,
            bedrooms: props?.product?.property?.bedrooms || null,
            garage: props?.product?.property?.garage || null,
            garage_size: props?.product?.property?.garage_size || null,
            year: props?.product?.property?.year || null,
            map: props?.product?.property?.map || null,
            map_address: props?.product?.property?.map_address || null,
            address: props?.product?.property?.address || null,
            zip: props?.product?.property?.zip || null,
            featured: props?.product?.property?.featured || 0,
            logged_in_to_view: props?.product?.property?.logged_in_to_view || 0,
            disclaimer: props?.product?.property?.disclaimer || null,
            virtual_tour: props?.product?.property?.virtual_tour || null,
            agent_display_option: props?.product?.property?.agent_display_option || null,
            attachments: props?.product?.property?.attachments || null,
            private_note: props?.product?.property?.private_note || null,
            energy_class: props?.product?.property?.energy_class || null,
            energy_global_index: props?.product?.property?.energy_global_index || null,
            renewable_energy_global_index: props?.product?.property?.renewable_energy_global_index || null,
            energy_performance: props?.product?.property?.energy_performance || null,
            epc_current_rating: props?.product?.property?.epc_current_rating || null,
            epc_potential_rating: props?.product?.property?.epc_potential_rating || null,
            sku: props?.product?.property?.sku || '',
            product_number: props?.product?.property?.product_number || null,
            stock_quantity: props?.product?.property?.stock_quantity || '',
            backorders: props?.product?.property?.backorders || null,
            rop_plan_duration: props?.product?.property?.rop_plan_duration || null,
            status: props?.product?.property?.status || PRODUCT_STATUS.PUBLISH,
            units: props?.product?.property?.units || null,
            area_size: props?.product?.property?.units || null,
            rooms: props?.product?.property?.units || null,
            bathrooms: props?.product?.property?.units || null
        });

        const storeProperty = () => {
            if (props?.product?.property?.id > 0) {
                propertyData.put(route('admin.products.property.update', props?.product?.property.id), {
                    errorBag: 'storeProperty',
                    preserveScroll: true,
                    onSuccess: (page) => {
                        console.log(page.props?.flash?.response?.message)
                        if (page.props?.flash?.response?.success === false) {
                        }
                    },
                    onError: (errors) => {
                        console.log('onError', errors)
                        alert.value = errors
                    }
                });
            } else {
                propertyData.post(route('admin.products.property.store'), {
                    errorBag: 'storeProperty',
                    preserveScroll: true,
                    onProgress: (progress) => {
                        console.log('onProgress', progress)
                    },
                    onSuccess: (page) => {
                        console.log('onSuccess', page)
                        console.log(page.props?.flash)
                        if (page.props?.flash?.response?.success === true) {
                            alert.value.show = true
                            alert.value.title = 'Response'
                            alert.value.intent = 'success'
                            alert.value.messages = page.props?.flash?.response?.message
                        }
                    },
                    onError: (errors) => {
                        console.log('onError', errors)
                        alert.value.show = true
                        alert.value.title = 'Something went wrong!'
                        alert.value.intent = 'danger'
                        alert.value.messages = errors
                    },
                    onCancel: () => {
                        console.log('onCancel')
                    },
                    onFinish: visit => {
                        console.log('onFinish', visit)
                    },
                });
            }
        }

        return {
            storeProperty,
            propertyData,
            alert
        }
    }
}
</script>

<style scoped>

</style>
