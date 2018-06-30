import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.By;
import org.openqa.selenium.support.ui.Select;

public class TestAddMember {

    public void signUp(){
        TestLogin login = new TestLogin();
        WebDriver driver = login.driver;
        System.setProperty("webdriver.chrome.driver","chromedriver.exe");
        driver.get("http://localhost/LIMS_V3.1/View/index.php");
        WebElement username = driver.findElement(By.id("username"));
        WebElement password = driver.findElement(By.id("password"));
        WebElement loginBtn = driver.findElement(By.id("loginBtn"));
        //assuming f is registered and signed up successfully
        username.sendKeys("f");
        password.sendKeys("pass");
        loginBtn.click();

        driver.get("http://localhost/LIMS_V3.1/View/addmemberview.php");

        WebElement firstname =    driver.findElement(By.id("firstname"));
        WebElement lastname =   driver.findElement(By.id("lastname"));
        WebElement username1=  driver.findElement(By.id("username1"));
        WebElement email=  driver.findElement(By.id("email"));
        WebElement phone=   driver.findElement(By.id("phone"));
        WebElement female =  driver.findElement(By.id("female"));
        WebElement dob = driver.findElement(By.id("dob"));
        WebElement address =   driver.findElement(By.id("address"));
        Select dept = new Select(driver.findElement(By.name("dept")));
        Select tou = new Select(driver.findElement(By.name("tou")));
        WebElement signupBtn =   driver.findElement(By.id("signupBtn"));

        firstname.sendKeys("Kebede");
        lastname.sendKeys("Dereje");
        username1.sendKeys("Kebede");
        email.sendKeys("kebedesemail@test.com");
        phone.sendKeys("0911111111");
        female.click();
        dob.sendKeys("09252013");
        address.sendKeys("Addis Ababa");
        dept.selectByIndex(1);
        tou.selectByIndex(1);
        signupBtn.click();

        WebElement save =   driver.findElement(By.id("signupF"));
        save.click();
        try{
            //if we get success text the test passes
            WebElement success =driver.findElement(By.id("successTxt"));
            System.out.println("TEST SIGNUP PASSED");
        }
        catch (Exception ex){
            System.out.println("TEST SIGNUP FAILED");

        }
        driver.close();
}

}
