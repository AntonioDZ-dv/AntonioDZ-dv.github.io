Public Class login
    Private Sub btnLogin_Click(sender As Object, e As EventArgs) Handles btnLogin.Click
        ' Validar las credenciales (puedes reemplazar esto con lógica más avanzada)
        Dim username As String = txtUsername.Text
        Dim password As String = txtPassword.Text

        If username = "admin" And password = "1234" Then
            ' Credenciales correctas: abrir el formulario principal
            Dim mainForm As New MainForm()
            mainForm.Show()
            Me.Hide() ' Oculta el formulario de inicio de sesión
        Else
            ' Credenciales incorrectas: mostrar un mensaje
            MessageBox.Show("Usuario o contraseña incorrectos.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error)
        End If
    End Sub
End Class
