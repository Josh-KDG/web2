<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\UtilisateurEnregistre;

class MessageController extends Controller
{
    // MessageController.php
public function sendMessage(Request $request)
{
    $validated = $request->validate([
        'content' => 'required|string',
        'receiver_id' => 'nullable|exists:users,id',
        'is_broadcast' => 'boolean',
    ]);

    $message = new Message([
        'sender_id' => auth()->id(),
        'receiver_id' => $request->receiver_id,
        'content' => $request->content,
        'is_broadcast' => $request->is_broadcast ?? false,
    ]);

    $message->save();

    // Si le message est une diffusion, envoyer à tous les utilisateurs
    if ($message->is_broadcast) {
        $utilisateursEnregistres = UtilisateurEnregistre::where('id', '!=', auth()->id())->get();
        foreach ($utilisateursEnregistres as $utilisateurEnregistre) {
            $this->sendEmailNotification($utilisateurEnregistre, $message);
        }
    } else {
        // Sinon, envoyer à l'utilisateur spécifique
        $this->sendEmailNotification(UtilisateurEnregistre::find($request->receiver_id), $message);
    }

    return redirect()->route('messages.index')->with('success', 'Message envoyé!');
}

protected function sendEmailNotification(UtilisateurEnregistre $user, Message $message)
{
    // Envoyer un email de notification à l'utilisateur
    Mail::to($user->email)->send(new MessageNotification($message));
}

}
