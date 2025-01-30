


<form action="/messages/send" method="POST">
    @csrf
    <textarea name="content" required></textarea>
    <input type="checkbox" name="is_broadcast" value="1"> Diffuser à tout le monde
    <select name="receiver_id">
        @foreach($utilisateursEnregistres as $utilisateurEnregistre)
            <option value="{{ $utilisateurEnregistre->id }}">{{ $utilisateurEnregistre->name }}</option>
        @endforeach
    </select>
    <button type="submit">Envoyer</button>
</form>
