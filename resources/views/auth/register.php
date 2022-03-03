<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="mt-24 bg-white rounded-lg shadow sm:max-w-md sm:w-full sm:mx-auto sm:overflow-hidden">
        <div class="px-4 py-8 sm:px-10">
            <div class="relative mt-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300">
                    </div>
                </div>
                <div class="relative flex justify-center text-sm leading-5">
                    <span class="px-2 text-gray-500 bg-white">
                        Register
                    </span>
                </div>
            </div>
            <div class="mt-6">
                <div class="w-full space-y-6">
                    <div class="w-full">
                        <div class=" relative ">
                            <input type="text"
                                name="name"
                                class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="Name" />
                        </div>
                    </div>
                    <div class="w-full">
                        <div class=" relative ">
                            <input type="text"
                                name="username"
                                class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="Username" />
                        </div>
                    </div>
                    <div class="w-full">
                        <div class=" relative ">
                            <input type="email"
                                name="email"
                                class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="Email" />
                        </div>
                    </div>
                    <div class="w-full">
                        <div class=" relative ">
                            <input type="password"
                                name="password"
                                class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="Password" />
                        </div>
                    </div>
                    <div>
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit"
                                class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                Register
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>