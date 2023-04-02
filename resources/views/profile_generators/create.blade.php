@extends('welcome')
@include('sweetalert::alert')
@section('content')
    <div class="bg-white">
        <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:py-16 lg:px-8 text-center">
        <img src="{{ url('images/pc.png')}}" alt="" width="300" height="100">
            <h2 class="inline text-3xl font-bold tracking-tight text-blue-800 sm:block sm:text-4xl">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-user fa-beat text-[25px] text-grey-600"></i> AI Policy Generator <i class="fa-solid fa-user fa-beat text-[25px] text-grey-600"></i></h2>
            <p class="inline text-3xl font-bold tracking-tight text-green-600 sm:block sm:text-4xl">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OpenAI auto-generated policy</p><br/>
            <span style="color:#2C5364; font-size: 18px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            PROMPT GUIDE</span><br/>
            <small><span style="color:#2C5364; font-size: 14px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Write the policy name and click on Generate policy</span></small><br/><br/>
            <form
                method="post"
                action="{{ route('generate-policy') }}"
            >
                @csrf
                <label for="dname">Document Name</label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input 
                class="w-full rounded-md border-gray-300 px-5 py-3 placeholder-gray-500 focus:border-green-500 focus:ring-green-500 sm:max-w-lg" 
                type="text" 
                name="dname"
                autocomplete="dname" 
                id="dname"
                placeholder="Document name" 
                required
                value="{{ request()->dname ?? '' }}"> <br/>
                
                <label for="dnumber">Document Number</label>
                <input 
                class="w-full rounded-md border-gray-300 px-5 py-3 placeholder-gray-500 focus:border-green-500 focus:ring-green-500 sm:max-w-lg" 
                type="number" 
                name="dnumber"
                autocomplete="dnumber" 
                id="dnumber" 
                placeholder="Document number" 
                required
                value="{{ request()->dnumber ?? '' }}"> <br/>

                <label for="rnumber">Revision Number</label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input 
                class="w-full rounded-md border-gray-300 px-5 py-3 placeholder-gray-500 focus:border-green-500 focus:ring-green-500 sm:max-w-lg" 
                type="number" 
                name="rnumber"
                autocomplete="rnumber" 
                id="rnumber" 
                placeholder="Revision number" 
                required
                value="{{ request()->rnumber ?? '' }}">
                <br/>

                <label for="approve">Approved by</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;
                <input 
                class="w-full rounded-md border-gray-300 px-5 py-3 placeholder-gray-500 focus:border-green-500 focus:ring-green-500 sm:max-w-lg" 
                name="approve"
                autocomplete="approve" 
                type="text" 
                id="approve" 
                placeholder="Approved by" 
                required
                value="{{ request()->approve ?? '' }}"> <br/>

                <label for="creationdate">Creation Date</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input 
                class="w-full rounded-md border-gray-300 px-5 py-3 placeholder-gray-500 focus:border-green-500 focus:ring-green-500 sm:max-w-lg" 
                type="date" 
                name="creationdate"
                autocomplete="creationdate" 
                id="creationdate" 
                required
                value="{{ request()->creationdate ?? '' }}"><br/>

                <label for="ptype">Policy Type</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select 
                class="w-full rounded-md border-gray-300 px-5 py-3 placeholder-gray-500 focus:border-green-500 focus:ring-green-500 sm:max-w-lg" 
                name="ptype"
                autocomplete="ptype"
                id="ptype" 
                placeholder="Policy type" 
                required
                value="{{ request()->ptype ?? '' }}
                >
                    <option value="select">select type:</option>
                    <option value="Privacy">Privacy</option>
                    <option value="Security">Security</option>
                    <option value="Security">Regulatory</option>
                    <option value="Security">Constituent</option>
                    <option value="Security">Distributive</option>
                    <option value="Security">Redistributive</option>
                </select><br/><br/>

                                               <label>Handling The Policy Name With Open AI Chat GPT-3</label>

                <label for="content" class="sr-only">Policy Content</label><br/><br/>
                <input
                    id="content"
                    name="content"
                    type="text"
                    autocomplete="content"
                    placeholder="Policy name" 
                    required
                    class="w-full rounded-md border-gray-300 px-5 py-3 placeholder-gray-500 focus:border-green-500 focus:ring-green-500 sm:max-w-lg"
                    value="{{ request()->content ?? '' }}"
                >
                <br/><br/>

                 <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                    
                    <button type="submit" class="items-center justify-center rounded-md border border-transparent bg-green-600 px-5
                     py-3 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                     Generate policy 🚀
                    </button>

                </div>
            </form>
        </div>
        @isset($dname)
            <div>
                <label for="dname" class="block text-sm font-medium text-gray-700">Document Name</label>
                <div class="mt-1">
                    <textarea
                        id="dname"
                        class="min-h-[8px] w-full mx-auto rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                    >{{ $dname }}</textarea>
                </div>
            </div>
        @endisset

        @isset($dnumber)
            <div>
                <label for="dnumber" class="block text-sm font-medium text-gray-700">Document Number</label>
                <div class="mt-1">
                    <textarea
                        id="dnumber"
                        class="min-h-[8px] w-full mx-auto rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                    >{{ $dnumber }}</textarea>
                </div>
            </div>
        @endisset

        @isset($rnumber)
            <div>
                <label for="rnumber" class="block text-sm font-medium text-gray-700">Revision Number</label>
                <div class="mt-1">
                    <textarea
                        id="rnumber"
                        class="min-h-[8px] w-full mx-auto rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                    >{{ $rnumber }}</textarea>
                </div>
            </div>
        @endisset

        @isset($approve)
            <div>
                <label for="approve" class="block text-sm font-medium text-gray-700">Approved By</label>
                <div class="mt-1">
                    <textarea
                        id="approve"
                        class="min-h-[8px] w-full mx-auto rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                    >{{ $approve }}</textarea>
                </div>
            </div>
        @endisset

        @isset($creationdate)
            <div>
                <label for="creationdate" class="block text-sm font-medium text-gray-700">Creation Date</label>
                <div class="mt-1">
                    <textarea
                        id="creationdate"
                        class="min-h-[8px] w-full mx-auto rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                    >{{ $creationdate }}</textarea>
                </div>
            </div>
        @endisset

        @isset($ptype)
            <div>
                <label for="ptype" class="block text-sm font-medium text-gray-700">Policy Type</label>
                <div class="mt-1">
                    <textarea
                        id="ptype"
                        class="min-h-[8px] w-full mx-auto rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                    >{{ $ptype }}</textarea>
                </div>
            </div>
        @endisset

        @isset($profile)
            <div>
                <label for="profile" class="block text-sm font-medium text-gray-700">AI Generated Policy Policy</label>
                <div class="mt-1">
                    <textarea
                        id="profile"
                        class="min-h-[720px] w-full mx-auto rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                    >{{ $profile }}</textarea>
                </div>
            </div>
        @endisset
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    </div>
                     <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                        <i class="fa-solid fa-laptop fa-beat text-[20px] text-grey-600"></i>
                            <a href="https://thecodecoffeelab.com" class="ml-1 underline" target="_blank">
        <center><span style="color:#2C5364"> Developer & Website: </span></a>&nbsp;&nbsp;Mohamed NDIAYE | &copy; THE CODE COFFEE LAB - All Rights Reserved. </center>
                        </div>
                    </div>

@endsection
