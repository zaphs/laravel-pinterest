<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Message;
use App\Repositories\MessageRepository;

class ShoutboxController extends Controller
{
    protected $messages;

    /**
     * ShoutboxController constructor.
     * @param MessageRepository $messages
     * @return void
     */
    public function __construct(MessageRepository $messages)
    {
        $this->middleware('auth');

        $this->messages = $messages;
    }

    public function shoutbox(Request $request)
    {
        $messages = $this->messages->forUser($request->user());

        return view('shoutbox.shoutbox', ['messages'=>$messages]);
    }

    public function messages(Request $request)
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(Request $request)
    {
        $this->validate($request, [
           'text' => 'required',
        ]);

        $request->user()->messages()->create([
            'text'     => $request->text,
            'entity_id' => 0,
        ]);

        return redirect('/shoutbox');
    }

    public function destroy(Request $request, Message $message)
    {
        $this->authorize('destroy', $message);

        $message->delete();

        return redirect('/shoutbox');
    }
}
