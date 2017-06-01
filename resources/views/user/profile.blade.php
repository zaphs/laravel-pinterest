@extends('layouts.app')

@section('content')

        <!-- Bootstrap Boilerplate... -->

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <div class="ow_page">
        <h1 class="ow_stdmargin ow_ic_user">{{ $user->name }}</h1>
        <div class="ow_content">
            <div class="ow_stdmargin" id="place_sections">
                <div class="clearfix">
                    <div class="clearfix" style="overflow: hidden;">

                        <div class="ow_left place_section left_section ow_supernarrow">

                            <div class="ow_dnd_widget">

                                <div class="ow_box_empty ow_stdmargin clearfix ow_no_cap ow_break_word">
                                    <div class="ow_avatar_console ow_center" id="avatar-console">
                                        <div id="avatar_console_image" style="height: 190px; background-image: url({{ $user->avatar }});">
                                        </div>
                                        <div class="user_online_wrap"><div class="ow_miniic_live"><span class="ow_live_on"></span></div></div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="ow_right place_section right_section ow_superwide">

                            <div class="ow_dnd_widget profile-BASE_CMP_UserViewWidget">

                                <div class="ow_box_empty ow_stdmargin clearfix profile-BASE_CMP_UserViewWidget ow_no_cap ow_break_word">



                                    <div class="user_profile_data" style="position:relative">

                                        <table class="ow_table_3 ow_nomargin section_f90cde5913235d172603cc4e7b9726e3 data_table">
                                            <tbody><tr class="ow_tr_first">
                                            </tr><tr class="ow_tr_first">
                                                <th colspan="2" class="ow_section"><span>INFO</span></th>
                                            </tr>

                                            <tr class="">
                                                <td class="ow_label" style="width: 20%">Real name</td>
                                                <td class="ow_value"><span class="">{{ $user->name }}</span></td>
                                            </tr>
                                            <tr class="">
                                                <td class="ow_label" style="width: 20%">Gender</td>
                                                <td class="ow_value"><span class="">{{ $user->gender }}</span></td>
                                            </tr>
                                            <tr class="">
                                                <td class="ow_label" style="width: 20%">Birthday</td>
                                                <td class="ow_value"><span class="">{{ $user->birthdate }}</span></td>
                                            </tr>
                                            <tr class="ow_tr_last">
                                                <td class="ow_label" style="width: 20%">Join Date</td>
                                                <td class="ow_value"><span class="">{{ $user->created_at }}</span></td>
                                            </tr>
                                            </tbody></table>
                                    </div>

                                    <div>
                                        {{ count($user->followers) }} followers
                                    </div>
                                    <div>
                                        {{ count($user->followings) }} followings
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


@endsection