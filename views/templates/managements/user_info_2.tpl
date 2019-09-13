<table class="table table-bordered">
    <tr>
        <th>管理権限 </th>
        <td>            
            <select name="auth" disabled>
            {html_options options=$auth selected=$user['auth']}
            </select>
        </td>
    </tr>
    <tr>
        <th>テスト合否 </th>
        <td>     
            <select name="test" disabled>
            {html_options options=$test selected=$user['test']}
            </select>
        </td>
    </tr>
    <tr>
        <th>入社日 </th>
        <td>{$user['indate']|escape}</td>
    </tr>
    <tr>
        <th>退社日 </th>
        <td>{$user['outdate']|escape}</td>
    </tr>
    <tr>
        <th>mail </th>
        <td>{$user['mail']|escape}</td>
    </tr>
    <tr>
        <th>memo </th>
        <td>{$user['memo']|escape}</td>
    </tr>  
</table>