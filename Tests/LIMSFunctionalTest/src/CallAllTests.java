public class CallAllTests {

    public static void main(String [] args){
        TestLogin login = new TestLogin();
        login.checkLogin("f","pass");

        TestAddDepartment department = new TestAddDepartment();
        department.addDepartment();

        TestAddMember signup = new TestAddMember();
        signup.signUp();

        TestAddSTT addSTT = new TestAddSTT();
        addSTT.addSTT();

        TestProfileView profileView = new TestProfileView();
        profileView.profileView();

        TestSample sample = new TestSample();
        sample.addSample();

        TestSearchDepartment searchDepartment = new TestSearchDepartment();
        searchDepartment.search();

        TestSearchSTT searchSTT = new TestSearchSTT();
        searchSTT.search();

        TestSearchTask searchTask = new TestSearchTask();
        searchTask.search();

        TestViewDepartment viewDepartment = new TestViewDepartment();
        viewDepartment.viewDepartment();

        TestSearchMember search = new TestSearchMember();
        search.search();

        TestViewMember view = new TestViewMember();
        view.view();


        TestProfileView viewProfile  = new TestProfileView();
        viewProfile.profileView();

        TestViewResult viewResult =  new TestViewResult();
        viewResult.viewResult();
    }
}
