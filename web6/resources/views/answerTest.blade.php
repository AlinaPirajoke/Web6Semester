@extends("default")

@section("content")
<div class="HeaderTest" align=center>
    <h2>Ответы на тест</h2>
</div>

<div class="answerTest"><table>
        <thead>
        <tr>
            <th>ФИО</th>
            <th>Ответ 1</th>
            <th>Ответ 2</th>
            <th>Ответ 3</th>
            <th>Верно</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($testAnswers as $testAnswer)
            <tr>
                <td>{{ $testAnswer->FIO }}</td>
                <td>{{ $testAnswer->answer1 }}</td>
                <td>{{ $testAnswer->answer2 }}</td>
                <td>{{ $testAnswer->answer3 }}</td>
                <td>{{ $testAnswer->isCorrect }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection("content")
